const express = require('express');
const sequelize = require('../../../config/database'); // Importer la connexion
const TableTickets = require('./models/tabletickets'); // Importer le modèle une seule fois
const app = express();
const PORT = process.env.PORT || 3000;

// Middleware pour servir les fichiers statiques
app.use(express.static('public'));

// Middleware pour parser le JSON
app.use(express.json());

// Route pour récupérer les tickets
app.get('/api/tickets', async (req, res) => {
    try {
        const tickets = await tabletickets.findAll(); // Utilise le bon modèle
        res.json(tickets); // Retourne les tickets au format JSON
    } catch (error) {
        console.error('Erreur lors de la récupération des tickets :', error);
        res.status(500).send('Erreur serveur');
    }
});

// Routes pour les autres pages
// ... (tes autres routes ici)

// Démarrer le serveur
app.listen(PORT, async () => {
    try {
        await sequelize.authenticate();
        console.log(`Serveur en cours d'exécution sur le port ${PORT}`);
    } catch (error) {
        console.error('Erreur de connexion à la base de données :', error);
    }
});

