document.addEventListener("DOMContentLoaded", function () {
    const searchBtn = document.getElementById("searchBtn");
    const fullText = document.getElementById("fullText");
    const keywords = document.getElementById("keywords");
    const resultsDiv = document.getElementById("results");

    searchBtn.addEventListener("click", function () {
        const keywordsList = keywords.value.match(/\bmod_\w+/g);
        const fullTextContent = fullText.value;

        resultsDiv.innerHTML = "";

        fetch('/search', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                fullText: fullTextContent,
                keywords: keywordsList
            })
        })
        .then(response => response.json())
        .then(data => {
            data.forEach(result => {
                if (result !== null && result !== undefined) {
                    const resultElement = document.createElement("p");
                    resultElement.textContent = `${result.keyword} (${result.module}), ${result.result}`;
                    resultsDiv.appendChild(resultElement);
                }
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});
