        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.querySelectorAll("p, a"); // Sélectionne tous les éléments <p> et <a> de la page
    
            elements.forEach(function(element) {
                element.addEventListener("mouseover", function() { // Ajoute un événement de survol à chaque élément
                    speakText(this); // Lit le texte de l'élément survolé
                });
            });
        });
    
        function speakText(element) {
            var textToSpeak = element.innerText;
            var utterance = new SpeechSynthesisUtterance(textToSpeak);
            window.speechSynthesis.speak(utterance);
        }