<script>
        function validateForm() {
            // Récupérer les valeurs des champs
            const nom = document.getElementById('nom').value;
            const prenom = document.getElementById('prenom').value;
            const cp = document.getElementById('cp').value;
            const email = document.getElementById('email').value;
            const mdp = document.getElementById('mdp').value;
            const mdp2 = document.getElementById('mdp2').value;
            const terms = document.getElementById('terms').checked;

            // Validation des champs
            if (nom === "" || prenom === "" || cp === "" || email === "" || mdp === "" || mdp2 === "") {
                alert("Tous les champs doivent être remplis.");
                return false;
            }

            // Vérifier le format de l'email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Veuillez entrer une adresse email valide.");
                return false;
            }

            // Vérifier que les mots de passe correspondent
            if (mdp !== mdp2) {
                alert("Les mots de passe ne correspondent pas.");
                return false;
            }

            // Vérifier que la case des conditions est cochée
            if (!terms) {
                alert("Vous devez accepter les conditions.");
                return false;
            }

            // Si toutes les validations sont passées
            alert("Votre compte a été créé avec succès !");
            return true;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const passwordField = document.getElementById('mdp');
            const togglePassword = document.getElementById('togglePassword');
            
            togglePassword.addEventListener('click', function () {
                // Vérifie si le champ est actuellement caché ou visible
                const type = passwordField.type === 'password' ? 'text' : 'password';
                passwordField.type = type;
                
                // Change l'icône en fonction de l'état du champ
                togglePassword.classList.toggle('fa-eye');
                togglePassword.classList.toggle('fa-eye-slash');
            });
        });
    </script>