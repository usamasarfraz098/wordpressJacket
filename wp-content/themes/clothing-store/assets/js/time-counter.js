function clothing_store_days_countdown() {
	const newYears = document.getElementById('new-year-date').value;
    const newYearsDate = new Date(newYears);
    const currentDate = new Date();

    var daysEl = document.getElementById('days');
	var hoursEl = document.getElementById('hours');
	var minsEL = document.getElementById('mins');
	var secondsEL = document.getElementById('seconds');

    const totalSeconds = (newYearsDate - currentDate) /1000;
    const minutes = Math.floor(totalSeconds/ 60) % 60;
    const hours = Math.floor(totalSeconds /3600) % 24;
    const days = Math.floor(totalSeconds /3600/ 24);
    const seconds = Math.floor(totalSeconds) % 60;
    
	daysEl.innerText = days;
	hoursEl.innerText = hours;
	minsEL.innerText = minutes;
	secondsEL.innerText = seconds;
}
setInterval(clothing_store_days_countdown, 1000);