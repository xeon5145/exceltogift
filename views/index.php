<div class="container-fluid bg-primary">
    <p class="h5 text-white">Question Bank File Formater</p>
</div>

<div class="row mt-5">
    <div class="col-1"></div>
    <div class="col-10 back-block">
        <form action="" id="qbFileForm" onsubmit="return false">

        <div class="mb-3">
            <label for="questionBankName" class="form-label">Question Bank Name</label>
            <input type="text" class="form-control" id="qbName" title="Enter Question Bank Name" placeholder="Enter Question Bank Name" required>
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

            <input type="submit" class="btn btn-primary" name="fileSubmit" id="fileSubmit" value="Confirm">

        </form>

    </div>
    <div class="col-1"></div>
</div>

<div class="row">
    <div class="col-1"></div>
    <div class="col-10" id="formatedPreview"></div>
    <div class="col-1"></div>
</div>

<script>
    $(function() {
        $("#qbFileForm").on("submit", function(evt) {
            evt.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "api/qbFormater.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#formatedPreview").html(data);
                    console.log("script is working");

                },
                error: function(xhr, status, error) {
                    console.error("AJAX Request Error:", status, error);
                    // Add user-friendly error handling if needed
                }
            });
        });
    });
</script>