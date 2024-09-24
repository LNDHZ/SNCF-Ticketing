const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3001;

// Configurer la connexion à la base de données
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root', // Remplacez par votre nom d'utilisateur MySQL
    password: '', // Remplacez par votre mot de passe MySQL
    database: 'sncf_ticketing' // Assurez-vous que c'est le bon nom de la base de données
});

// Connectez-vous à la base de données
connection.connect((err) => {
    if (err) {
        console.error('Erreur de connexion: ' + err.stack);
        return;
    }
    console.log('Connecté à la base de données');
});

// Définir la route pour récupérer des données
app.get('/api/donnees', (req, res) => {
    connection.query('SELECT * FROM table_utilisateur', (error, results) => {
        if (error) {
            return res.status(500).json({ error: error.message });
        }
        res.json(results);
    });
});

// Démarrer le serveur
app.listen(port, () => {
    console.log(`Serveur en cours d'exécution à http://localhost:${port}`);
});
