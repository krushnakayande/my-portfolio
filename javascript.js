document.addEventListener('DOMContentLoaded', function() {
  const contactForm = document.getElementById('contact-form');
  
  contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(contactForm);
      
      fetch('sendmail.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              // Show success message to the user
              alert('Your message has been sent successfully!');
              // Clear the form
              contactForm.reset();
          } else {
              // Show error message to the user
              alert('Failed to send message. Please try again later.');
          }
      })
      .catch(error => {
          console.error('Error:', error);
          // Show error message to the user
          alert('An error occurred. Please try again later.');
      });
  });
});
