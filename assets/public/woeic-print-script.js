document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("printButton").addEventListener("click", function () {
        var printContents = document.querySelector(".woeic_print_this").outerHTML;
        var printWindow = window.open('', '_blank');
        
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print</title></head><body>');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        printWindow.print();
    });
});
