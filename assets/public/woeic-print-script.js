
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("printButton").addEventListener("click", function () {
        var printContents = document.querySelector(".woeic_print_this").innerHTML;
        var printWindow = window.open('f', '_blank');
        
        printWindow.document.open();
        printWindow.document.write('<html><head></head><body>');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        printWindow.print();
    });
});