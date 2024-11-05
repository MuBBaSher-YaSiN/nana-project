document.getElementById('search-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const keyword = document.getElementById('search-keyword').value;

    // Basic input validation
    if (!keyword) {
        alert("Please enter a valid search term.");
        return;
    }

    // Fetch search results from the server
    fetch(`Server/api/search.php?keyword=${encodeURIComponent(keyword)}`)
        .then(response => response.json())
        .then(data => {
            const resultsContainer = document.getElementById('search-results');
            resultsContainer.innerHTML = ''; // Clear previous results

            if (data.length === 0) {
                resultsContainer.innerHTML = '<p>No results found.</p>';
            } else {
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.innerHTML = `<h3>${item.name}</h3><p>${item.description}</p>`;
                    resultsContainer.appendChild(div);
                });
            }
        })
        .catch(error => {
            console.error('Error fetching search results:', error);
        });
});

/*function Fetch_products() {
    fetch('Server/api/Fetch_products.php') 
    . then(response => response.text())
    . then(data=> {
        document.getElementById('search-results').innerHTML = data; 
    })
    . catch(error => console.error('ERROR: ', error));
}*/
