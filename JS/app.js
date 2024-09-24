const express = require('express');
const sequelize = require('./config/database'); // Importer la connexion
const path = require('path'); // Déclarer 'path' ici
const TableTickets = require(path.resolve(__dirname, './news_sncf_ticketing/app/Models/tabletickets.cjs'));
const app = express();
const PORT = process.env.PORT || 3000;

// Middleware pour servir les fichiers statiques
app.use(express.static('public'));

// Middleware pour parser le JSON
app.use(express.json());

// Route pour récupérer les tickets
app.get('/api/tickets', async (req, res) => {
    try {
        const tickets = await TableTickets.findAll(); // Utilise le bon modèle
        res.json(tickets); // Retourne les tickets au format JSON
    } catch (error) {
        console.error('Erreur lors de la récupération des tickets :', error);
        res.status(500).send('Erreur serveur');
    }
});

// Démarrer le serveur
app.listen(PORT, async () => {
    try {
        await sequelize.authenticate();
        console.log(`Serveur en cours d'exécution sur le port ${PORT}`);
    } catch (error) {
        console.error('Erreur de connexion à la base de données :', error);
    }
});
