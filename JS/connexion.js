<script>
  // Ajouter un écouteur d'événement au formulaire
  document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche l'envoi du formulaire par défaut
    
   
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    
    if (email && password) {
      // Redirige vers une autre page
      window.location.href = "/HTML/page_oubli_mdp.html"; 
    } else {
      alert("Veuillez remplir tous les champs");
    }
  });
</script>