<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المكتبة القانونية - الدستور الأردني</title>
    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/index.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- PDF.js Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js"></script>

    <style>
      /* Base styles */
.pdf-section {
    background-color: #121518;
    padding: 1rem;
    border-radius: 10px;
    margin: 1rem 0;
    width: 100%;
}

.search-wrapper {
    background-color: #fff;
    padding: 1rem;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 1rem;
}

.search-bar {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.search-input {
    flex: 1;
    padding: 0.75rem;
    border: 2px solid #aa9166;
    border-radius: 5px;
    font-size: 1rem;
    direction: rtl;
    width: 100%;
    -webkit-appearance: none;
}

.search-button {
    background-color: #aa9166;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
    min-height: 44px;
}

.search-button:hover {
    background-color: #8f7954;
}

#results {
    background-color: #f8f9fa;
    border-radius: 5px;
    padding: 1rem;
    margin-top: 1rem;
}

#results ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#results li {
    margin: 0.5rem 0;
}

#results a {
    color: #aa9166;
    text-decoration: none;
    display: block;
    padding: 0.75rem;
    border-radius: 3px;
    transition: background-color 0.3s;
    font-size: 14px;
}

#results a:hover {
    background-color: #aa916620;
}

#pdfViewer {
    background-color: #fff;
    padding: 1rem;
    border-radius: 10px;
    height: 500px;
    overflow: auto;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    display: flex;
    justify-content: center;
    align-items: flex-start;
    -webkit-overflow-scrolling: touch;
}

#pdfViewer canvas {
    max-width: 100%;
    height: auto !important;
    width: auto !important;
}

.page-controls {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 0.5rem;
    margin: 1rem 0;
    background-color: #fff;
    padding: 0.75rem;
    border-radius: 5px;
}

.page-button {
    background-color: #aa9166;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    min-height: 44px;
    width: 100%;
}

.page-button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

.page-info {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    color: #121518;
    font-weight: bold;
}

.section-title {
    color: #aa9166;
    text-align: center;
    margin-bottom: 1.5rem;
    font-size: 1.5rem;
}
/* Custom scrollbar styles */

/* Tablet Styles (768px and up) */
@media screen and (min-width: 768px) {
    .pdf-section {
        padding: 1.5rem;
        margin: 1.5rem 0;
    }

    .search-wrapper {
        padding: 1.25rem;
    }

    .search-bar {
        flex-direction: row;
        gap: 1rem;
    }

    .search-button {
        width: auto;
    }

    #pdfViewer {
        height: 600px;
    }

    .page-controls {
        flex-direction: row;
        justify-content: center;
        padding: 1rem;
    }

    .page-button {
        width: auto;
    }

    #results a {
        font-size: 16px;
    }

    .section-title {
        font-size: 1.75rem;
    }
}

/* Desktop Styles (1024px and up) */
@media screen and (min-width: 1024px) {
    .pdf-section {
        padding: 2rem;
        margin: 2rem 0;
    }

    .search-wrapper {
        padding: 1.5rem;
    }

    #pdfViewer {
        height: 700px;
    }

    .section-title {
        font-size: 2rem;
    }
}

/* High DPI Screens */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .search-input,
    .search-button,
    .page-button {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
}
    </style>
</head>
<body>
    <!-- Navbar Start -->
    @include('layouts.User-Header')
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Legal Library </h2>
                </div>
                <div class="col-12">
                    <a href="{{ route('user.home') }}">Home</a>
                    <a href="{{ route('user.legal-library') }}">Jordanian Constitution </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- PDF Viewer and Search Section -->
    <div class="container">
        <div class="pdf-section">
            <h3 class="section-title">Jordanian Constitution </h3>
            
            <div class="search-wrapper">
                <div class="search-bar">
                    <input type="text" id="searchText" placeholder="Search the Jordanian constitution" class="search-input" />
                    <button id="searchButton" class="search-button">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
                <div id="results"></div>
            </div>
            
            <div class="page-controls">
                <button id="nextPage" class="page-button">
                    Next Page <i class="fas fa-chevron-right"></i>
                </button>
                <div class="page-info">
                    page <span id="currentPage">1</span> from <span id="totalPages">-</span>
                </div>
                <button id="prevPage" class="page-button" disabled>
                    <i class="fas fa-chevron-left"></i> Previous page
                </button>
                
            </div>

            <div id="pdfViewer"></div>
        </div>
    </div>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script>
<!-- Count Up Script -->
    <!-- Footer Start -->
    @include('layouts.User-Footer')
    <!-- Footer End -->

    <script>
        const pdfUrl = "{{ asset('user/files/constitution2022.pdf') }}";
        const pdfViewer = document.getElementById("pdfViewer");
        const searchText = document.getElementById("searchText");
        const searchButton = document.getElementById("searchButton");
        const resultsContainer = document.getElementById("results");
        const prevPageButton = document.getElementById("prevPage");
        const nextPageButton = document.getElementById("nextPage");
        const currentPageSpan = document.getElementById("currentPage");
        const totalPagesSpan = document.getElementById("totalPages");

        let pdfDoc = null;
        let currentPage = 1;
        
        // Initialize PDF.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = pdfjsLib.GlobalWorkerOptions.workerSrc;

        // Load the PDF
        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
            pdfDoc = pdf;
            totalPagesSpan.textContent = pdf.numPages;
            renderPage(currentPage);
        }).catch(function(error) {
            console.error("Error loading PDF:", error);
            pdfViewer.innerHTML = '<div class="alert alert-danger">Sorry, there was an error uploading the file.</div>';
        });

        // Render a single page
        function renderPage(pageNumber) {
            pdfDoc.getPage(pageNumber).then(function(page) {
                const viewport = page.getViewport({ scale: 1.5 });
                const canvas = document.createElement("canvas");
                const context = canvas.getContext("2d");
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderContext = {
                    canvasContext: context,
                    viewport: viewport,
                };

                pdfViewer.innerHTML = "";
                pdfViewer.appendChild(canvas);
                
                page.render(renderContext).promise.then(() => {
                    // Update UI
                    currentPageSpan.textContent = pageNumber;
                    prevPageButton.disabled = pageNumber <= 1;
                    nextPageButton.disabled = pageNumber >= pdfDoc.numPages;
                    currentPage = pageNumber;
                });
            });
        }

        // Page navigation
        prevPageButton.addEventListener("click", () => {
            if (currentPage > 1) {
                renderPage(currentPage - 1);
            }
        });

        nextPageButton.addEventListener("click", () => {
            if (currentPage < pdfDoc.numPages) {
                renderPage(currentPage + 1);
            }
        });

        // Enhanced search functionality
        searchButton.addEventListener("click", function() {
            const query = searchText.value.trim();
            if (!query) {
                resultsContainer.innerHTML = '<div class="alert alert-warning">Please enter text to search.</div>';
                return;
            }

            resultsContainer.innerHTML = '<div class="alert alert-info">Searching...</div>';
            let matches = [];

            const searchPromises = [];
            for (let i = 1; i <= pdfDoc.numPages; i++) {
                searchPromises.push(
                    pdfDoc.getPage(i).then(function(page) {
                        return page.getTextContent().then(function(textContent) {
                            const textItems = textContent.items.map(item => item.str);
                            const fullText = textItems.join(" ");
                            if (fullText.toLowerCase().includes(query.toLowerCase())) {
                                // Get surrounding context
                                const index = fullText.toLowerCase().indexOf(query.toLowerCase());
                                const start = Math.max(0, index - 50);
                                const end = Math.min(fullText.length, index + query.length + 50);
                                const context = fullText.substring(start, end);
                                matches.push({
                                    page: i,
                                    context: context
                                });
                            }
                        });
                    })
                );
            }

            Promise.all(searchPromises).then(() => {
                if (matches.length > 0) {
                    resultsContainer.innerHTML = `
                        <div class="alert alert-success">
                            Found ${matches.length} result
                        </div>
                        <ul>
                    `;
                    matches.forEach(match => {
                        const highlightedContext = match.context.replace(
                            new RegExp(query, 'gi'),
                            `<mark>${query}</mark>`
                        );
                        resultsContainer.innerHTML += `
                            <li>
                                <a href="#" onclick="renderPage(${match.page}); return false;">
                                    page ${match.page}: ${highlightedContext}
                                </a>
                            </li>
                        `;
                    });
                    resultsContainer.innerHTML += '</ul>';
                } else {
                    resultsContainer.innerHTML = '<div class="alert alert-warning">No results found</div>';
                }
            });
        });

        // Add keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') {
                prevPageButton.click();
            } else if (e.key === 'ArrowLeft') {
                nextPageButton.click();
            }
        });

        // Add search on Enter key
        searchText.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                searchButton.click();
            }
        });
    </script>
</body>
</html>