
                    
      
       
    <script>
        function validateForm() {
            const nom = document.getElementById('nom').value;
            const email = document.getElementById('email').value;
            const demande = document.getElementById('demande').value;

            if (nom === "" || email === "" || demande === "") {
                alert("Tous les champs doivent être remplis avant l'envoi.");
                return false;
            }

            // Afficher un message après l'envoi
            alert("Votre demande a été envoyée avec succès, nous vous répondrons dans les plus brefs délais !");
            return true;
        }
    </script>
