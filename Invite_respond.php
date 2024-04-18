<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $attendance = $_POST["attendance"];

    // Sender and recipient settings
    $from = 'website@brandent.in';
    $to_user = $email; // User's email
    $to_admin = 'website@brandent.in'; // Admin's email

    // Send a thank you email to the user
    $user_subject = "Thank You for RSVPing";
    $user_message = "Dear $name,\n\nThank you for RSVPing. Your attendance status: $attendance\n\nBest regards,\nYour Name";
    $user_headers = "From: $from";

    mail($to_user, $user_subject, $user_message, $user_headers);

    // Send an email to the admin
    $admin_subject = "New RSVP Submission";
    $admin_message = "Name: $name\nEmail: $email\nAttendance: $attendance";
    $admin_headers = "From: $email";

    mail($to_admin, $admin_subject, $admin_message, $admin_headers);

    // Redirect to a thank you HTML page
    header("Location: https://wedding-card-brown.vercel.app/index.html");
    exit(); // Ensure no further code execution after redirection
}
?>


<!-- <script>
  const scriptURL = '<SCRIPT URL>'
  const form = document.forms['submit-to-google-sheet']

  form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => {
        console.log('Success!', response);
        // Add the redirection logic here
        window.location.href = 'google.com';
      })
      .catch(error => console.error('Error!', error.message))
  })
</script> -->