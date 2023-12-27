<div class="container-fluid bg-primary">
    <p class="h5 py-3 text-white">Question Bank File Formater</p>
</div>

<div class="row mt-5">
    <div class="col-1"></div>
    <div class="col-10 back-block">
        <form action="" id="qbFileForm" onsubmit="return false">

            <div class="mb-3">
                <!-- <div class="alert alert-info" role="alert">
                    Standardise the excel file to avoid irrelevant lines
                </div> -->
                <a class="fw-bold text-decoration-none text-info" download="Question Bank Template" href="Template/Question Bank Sample.xlsx">Click here to downlaod question bank file template</a>
            </div>

            <div class="mb-3">
                <label for="questionBankName" class="form-label">Question Bank Name</label>
                <input type="text" class="form-control" id="qbName" name="qbName" title="Enter Question Bank Name" placeholder="Enter Question Bank Name" required>
            </div>

            <div class="mb-3">
                <label for="questionBank" class="form-label">Select Question Bank Langauge</label>
                <select class="form-control" name="langauge" id="language" title="Please Choose Language" required>
                    <option value="" selected disabled>Please choose langauge</option>
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Gujrati">Gujrati</option>
                    <option value="Bilingual">Bilingual</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="questionBank" class="form-label">Select Question Bank File</label>
                <input type="file" class="form-control" name="questionBank" id="questionBank" required>
            </div>

            <p class="">

            </p>

            <input type="submit" class="btn btn-primary" name="fileSubmit" id="fileSubmit" value="Confirm">



        </form>

    </div>
    <div class="col-1"></div>
</div>



<div class="row mt-5">
    <div class="col-1"></div>
    <div class="col-10 back-block" id="successDiv" style="display: none;">
        <div class="text-center text-info">
            <strong>
                <p>The file has been converted successfully , Please click the button below to download your file</p>
            </strong>
        </div>
        <div class="text-center">
            <button class="btn btn-success" onclick="exportTextToFile()">Export Text</button>
        </div>
    </div>
    <div class="col-1"></div>
</div>

<div class="text-center text-secondary mt-3" id="orDiv" style="display: none;">
    <strong>
        <p>Or copy from below</p>
    </strong>
</div>

<div class="row mt-3 me-3" >
    <div class="col-1"></div>
    <div class="col-10 back-block p-5" id="PreviewDiv" style="display: none;">
        <div id="formatedPreview"></div>
    </div>
    <div class="col-1"></div>
</div>

<script>
    $(function() {
        $("#qbFileForm").on("submit", function(evt) {
            evt.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "api/qbFormater2.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#formatedPreview").html(data);
                    $('#successDiv').css('display', 'block');
                    $('#orDiv').css('display', 'block');
                    $('#PreviewDiv').css('display', 'block');
                },
                error: function(xhr, status, error) {
                    // console.error("AJAX Request Error:", status, error);
                    $('#failedDiv').css('display', 'block');
                    // Add user-friendly error handling if needed
                }
            });
        });
    });


    function exportTextToFile() {

        var qbName = document.getElementById('qbName').value;
        var qblanguage = document.getElementById('language').value;
        var textContent = document.getElementById('formatedPreview').innerText;

        // Create a Blob with the text content
        var blob = new Blob([textContent], {
            type: 'text/plain'
        });

        // Create a link element
        var link = document.createElement('a');

        // Set the download attribute and file name
        link.download = qbName + ' - ' + qblanguage;

        // Create a URL for the Blob and set it as the href attribute
        link.href = window.URL.createObjectURL(blob);

        // Append the link to the document
        document.body.appendChild(link);

        // Trigger a click on the link to start the download
        link.click();

        // Remove the link from the document
        document.body.removeChild(link);
    }
</script>