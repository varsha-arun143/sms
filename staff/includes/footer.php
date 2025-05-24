<footer class="footer-wrap-layout1">
    <div class="copyright">
        <!-- Updated to Sabeel Academy & current year -->
        © 2025 <a href="#">Sabeel Academy</a>. All rights reserved.
        Designed by <a href="hifi11.in">hifi11 Technologies</a>
    </div>
</footer>
<script>
$(document).ready(function () {
    // Click event on a notification
    $('.dropdown-item').on('click', function () {
        var notificationId = $(this).data('notification-id'); // Get notification ID from the clicked item
        
     
        var $clickedNotification = $(this); // Store the clicked notification for later use

        $.ajax({
            url: 'mark_as_read.php', // Path to the PHP script
            type: 'POST',
            data: { notification_id: notificationId }, // Send notification ID to the server
            success: function (response) {
                // Optional: Hide the notification or mark it as read in the UI
                $clickedNotification.remove(); // This removes the notification from the dropdown (if clicked)
                console.log(response); // Log success message (can be removed later)
            },
            error: function () {
                alert("Error marking notification as read.");
            }
        });
    });
});
</script>