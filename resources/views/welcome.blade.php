    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dynamic Category Selection</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            .category-card {
                border: 1px solid #ddd;
                padding: 20px;
                border-radius: 10px;
                text-align: center;
                margin-bottom: 20px;
            }
            .select-btn {
                background-color: #d12c56;
                color: white;
                border: none;
                padding: 10px;
                width: 100%;
                cursor: pointer;
            }
            .select-btn.active {
                background-color: #a51e40;
            }
        </style>
    </head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <!-- Category Cards -->
                <div class="col-md-4">
                    <div class="category-card">
                        <h5>Wedding Photographer of the Year</h5>
                        <label>Number of entries:</label>
                        <select class="form-select entry-count" disabled>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <p>Price per entry: Rs. <span class="price">4500</span></p>
                        <button class="select-btn" data-selected="false">Select</button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="category-card">
                        <h5>Wedding Filmmaker of the Year</h5>
                        <label>Number of entries:</label>
                        <select class="form-select entry-count" disabled>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <p>Price per entry: Rs. <span class="price">4500</span></p>
                        <button class="select-btn" data-selected="false">Select</button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="category-card">
                        <h5>Pre-wedding Photography</h5>
                        <label>Number of entries:</label>
                        <select class="form-select entry-count" disabled>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <p>Price per entry: Rs. <span class="price">4500</span></p>
                        <button class="select-btn" data-selected="false">Select</button>
                    </div>
                </div>
            </div>

            <!-- Total Price Section -->
            <div class="text-center mt-4">
                <button id="pay-btn" class="btn btn-success btn-lg">Pay Rs. 0</button>
            </div>
        </div>

        <script>
          $(document).ready(function () {
    function updateTotal() {
        let total = 0;
        $(".category-card").each(function () {
            let btn = $(this).find(".select-btn");
            let entrySelect = $(this).find(".entry-count");
            let priceDisplay = $(this).find(".price");

            if (btn.attr("data-selected") === "true") {
                let basePrice = 4500;
                let extraEntryPrice = 1500;
                let quantity = parseInt(entrySelect.val());

                let totalPrice = basePrice;
                if (quantity > 1) {
                    totalPrice += (quantity - 1) * extraEntryPrice;
                }

                priceDisplay.text(totalPrice);
                total += totalPrice;
            } else {
                priceDisplay.text(4500);
            }
        });

        $("#pay-btn").text("Pay Rs. " + total);
        $("#pay-btn").prop("disabled", total === 0);
    }

    $(".select-btn").click(function () {
        let isSelected = $(this).attr("data-selected") === "true";
        let categoryCard = $(this).closest(".category-card");
        let entrySelect = categoryCard.find(".entry-count");

        $(this).attr("data-selected", !isSelected);
        $(this).toggleClass("active", !isSelected);

        entrySelect.prop("disabled", isSelected);

        updateTotal();
    });

    $(".entry-count").change(function () {
        updateTotal();
    });

    $("#pay-btn").click(function () {
    let selectedCategories = [];

    $(".category-card").each(function () {
        let btn = $(this).find(".select-btn");
        let entrySelect = $(this).find(".entry-count");
        let priceDisplay = $(this).find(".price");

        if (btn.attr("data-selected") === "true") {
            selectedCategories.push({
                name: $(this).find("h5").text(),
                entries: parseInt(entrySelect.val()),
                total_price: parseInt(priceDisplay.text())
            });
        }
    });

    $.ajax({
        url: "/save-demo-categories",
        type: "POST",
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            categories: selectedCategories
        },
        success: function (response) {
            alert(response.message);
            loadSavedCategories();
        }
        
    });
});


    function loadSavedCategories() {
        $.ajax({
            url: "/fetch-demo-categories",
            type: "GET",
            success: function (data) {
                let savedList = $("#saved-categories");
                savedList.empty();

                if (data.length > 0) {
                    savedList.append("<h3>Saved Categories:</h3>");
                    data.forEach(category => {
                        savedList.append(`
                            <p><strong>${category.category_name}</strong> - Entries: ${category.entries}, Price: Rs. ${category.total_price}</p>
                        `);
                    });
                } else {
                    savedList.append("<p>No categories selected yet.</p>");
                }
            }
        });
    }

    // Load saved categories on page load
    loadSavedCategories();
});

        </script>
    </body>
    </html>
