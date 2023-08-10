const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(express.static('public'));


app.get('/', (req, res) => {
    res.sendFile(__dirname + '/public/index.html');
});

app.post('/search', (req, res) => {
    const fullText = req.body.fullText;
    const keywordsList = req.body.keywords;

    const results = keywordsList.map(keyword => {
        if (keyword.startsWith("mod_")) {
            const keywordWithoutPrefix = keyword.slice(4);
            const regex = new RegExp(`\\b${keyword}\\b`); // Updated line
            const found = regex.test(fullText);
            return {
                keyword: keyword,
                module: keywordWithoutPrefix,
                result: found ? "FOUND" : "NOT FOUND"
            };
        }
    });

    res.send(results);
});


app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
