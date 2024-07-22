<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<!-- page vendor js file -->
<script src="assets/vendor/toastr/toastr.js"></script>
<script src="assets/bundles/c3.bundle.js"></script>

<!-- page js file -->
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="../js/index.js"></script>
<script>
    document.getElementById("selectOption").addEventListener("change", function() {
    var selectedOption = this.value;
    var displayDiv = document.getElementById("displayDiv");

    if (selectedOption === "General inquiry") {
        displayDiv.style.display = "block";
    } else {
        displayDiv.style.display = "none";
    }
});


</script>

</body>
</html>