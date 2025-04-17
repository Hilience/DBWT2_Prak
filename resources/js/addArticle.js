document.addEventListener('DOMContentLoaded', function() {
    // Formular erstellen
    const formContainer = document.createElement('div');
    formContainer.innerHTML = `
        <h2>Neuen Artikel hinzufügen</h2>
        <form id="articleForm">
            <label for="name">Name des Artikels:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="price">Preis:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" required><br><br>

            <label for="description">Beschreibung:</label>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

            <button type="button" id="saveButton">Speichern</button>
        </form>
        <div id="errorMessage" style="color: red; display: none;"></div>
    `;
    document.body.appendChild(formContainer);

    // Formular validieren und absenden
    document.getElementById('saveButton').addEventListener('click', function() {
        // Eingabefelder
        const name = document.getElementById('name').value.trim();
        const price = parseFloat(document.getElementById('price').value);
        const description = document.getElementById('description').value.trim();

        // Validierung der Eingaben
        let errorMessage = '';

        if (name === '') {
            errorMessage += 'Name darf nicht leer sein.<br>';
        }

        if (price <= 0) {
            errorMessage += 'Preis muss größer als 0 sein.<br>';
        }

        if (description === '') {
            errorMessage += 'Beschreibung darf nicht leer sein.<br>';
        }

        // Zeige Fehlermeldung, wenn die Eingabe ungültig ist
        if (errorMessage !== '') {
            document.getElementById('errorMessage').innerHTML = errorMessage;
            document.getElementById('errorMessage').style.display = 'block';
        } else {
            document.getElementById('errorMessage').style.display = 'none';

            // Wenn Eingaben gültig sind, Daten absenden
            const articleData = {
                name: name,
                price: price,
                description: description
            };

            // Senden der Daten via POST an /articles
            fetch('/articles', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(articleData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Artikel erfolgreich gespeichert!');
                        document.getElementById('articleForm').reset();  // Formular zurücksetzen
                    } else {
                        alert('Fehler beim Speichern des Artikels: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Fehler:', error);
                    alert('Es gab ein Problem mit dem Server. Bitte versuche es später erneut.');
                });
        }
    });
});
