<?php

namespace Depicter\Services;

use Depicter\GuzzleHttp\Client;
use Depicter\GuzzleHttp\Exception\GuzzleException;

class GoogleFontsService{

	/**
	 * Download Google fonts to depicter upload directory
	 *
	 * @param $cssLink
	 *
	 * @return array $downloadedFontsLinks
	 */
	public function download( $cssLink ) {
		$client = new Client();
		$downloadedFontsLinks = [];
		try {
			$cssContent = $client->get( $cssLink )->getBody()->getContents();
			preg_match_all( '/@font-face\s{([^}]*)}/', $cssContent, $fontFaces, PREG_SET_ORDER );
			if ( !empty( $fontFaces ) ) {

				$fileSystem = \Depicter::storage()->filesystem();
				$googleFontsDir = \Depicter::storage()->getPluginUploadsDirectory() . '/fonts/google';
				if ( ! $fileSystem->isDir( $googleFontsDir ) ) {
					$fileSystem->mkdir( $googleFontsDir, true );
				}

				foreach( $fontFaces as $fontFace ) {
					preg_match( "/font-family:\s'([^\']*)'/", $fontFace[0], $fontFamily );
					$fontFamilySlug = str_replace( ' ', '-', $fontFamily[1] );
					preg_match_all( '/url\(([^\)]*)/', $fontFace[0], $urls, PREG_SET_ORDER );
					if ( !empty( $urls ) ) {
						foreach( $urls as $url ) {
							if ( false !== strpos( $url[1], 'fonts.gstatic' ) ) {
								// Create google font directory if not exist
								if ( ! $fileSystem->isDir( $googleFontsDir . '/' . $fontFamilySlug ) ) {
									$fileSystem->mkdir( $googleFontsDir . '/' . $fontFamilySlug );
								}

								// Download Font File
								$fileName = pathinfo( $url[1],PATHINFO_BASENAME );
								$savedGoogleFontPath = $googleFontsDir . '/' . $fontFamilySlug . '/' . $fileName;
								if ( !$fileSystem->isFile( $savedGoogleFontPath ) ) {
									$client->get( $url[1], [ 'sink' => $savedGoogleFontPath ] );

									// update font face css file
									$fontFace[0] = str_replace( $url[1], $fontFamilySlug . '/' . $fileName, $fontFace[0] );
									if ( ! $fileSystem->isFile( $googleFontsDir . '/' . $fontFamilySlug . '.css' ) ) {
										$fileSystem->write( $googleFontsDir . '/' . $fontFamilySlug . '.css', $fontFace[0] . "\n" );
									} else {
										$fontFaceContent = $fileSystem->read( $googleFontsDir . '/' . $fontFamilySlug . '.css' );
										$fontFaceContent = $fontFaceContent . $fontFace[0] . "\n";
										$fileSystem->write( $googleFontsDir . '/' . $fontFamilySlug . '.css', $fontFaceContent );
									}
								}

								$downloadedFontsLinks[ $fontFamilySlug ] = \Depicter::storage()->uploads()->getBaseUrl() . '/depicter/fonts/google/' . $fontFamilySlug . '.css';
							}
						}
					}
				}
			}

			return $downloadedFontsLinks;
		} catch ( GuzzleException $exception ) {
			preg_match_all( '/family=(.+?)&/', $cssLink, $fontFamilies, PREG_SET_ORDER );
			if ( !empty( $fontFamilies ) ) {
				$fontFamilies = explode( '|', $fontFamilies[0][1] );
				foreach( $fontFamilies as $fontFamily ) {
					$fontFamilyName = explode( ':', $fontFamily );
					$fontFamilySlug = str_replace( '+', '-', $fontFamilyName[0] );
					if ( file_exists( \Depicter::storage()->uploads()->getBaseDirectory() . '/depicter/fonts/google/' . $fontFamilySlug . '.css' ) ) {
						$downloadedFontsLinks[ $fontFamilySlug ] = \Depicter::storage()->uploads()->getBaseUrl() . '/depicter/fonts/google/' . $fontFamilySlug . '.css';
					}
				}
			}
			error_log( $exception->getMessage(), 0 );
			return $downloadedFontsLinks;
		}
	}

	public function getCssIdForLocalFont( $documentID, $fontFamilySlug ){
		return 'depicter--' . $documentID . '-local-g-font-' . strtolower( $fontFamilySlug );
	}

	public function swapToLocalLinks( $documentID, $cssLinks ){
		$localLinks = [];

		foreach( $cssLinks as $cssId => $cssLink ){
			if ( false !== strpos( $cssId, 'google-font' ) ) {
				$links = $this->download( $cssLink );
				foreach( $links as $fontFamilySlug => $link ) {
					$localLinks[ $this->getCssIdForLocalFont( $documentID, $fontFamilySlug ) ] = $link;
				}
			} else {
				$localLinks[ $cssId ] = $cssLink;
			}
		}

		return $localLinks;
	}
}
