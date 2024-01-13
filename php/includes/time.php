<div class="date-time">
    <p id="datetime">Loading Time...</p>
</div>

<script>
    // JavaScript for the automatic time and date
    setInterval(function () {
        var dateTimeElement = document.getElementById("datetime");
        var now = new Date();

        // Simulate an asynchronous delay (replace this with actual time-fetching logic)
        setTimeout(function () {
            // Replace the loading text with the actual time
            dateTimeElement.innerText = "Today is " + now.toLocaleDateString() + " and the time is " + now.toLocaleTimeString();
        }, 1000); // Replace 1000 with the actual time-fetching interval
    }, 1000);
</script>
