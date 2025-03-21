const customSwal = Swal.mixin({
    customClass: {
        popup: 'custom-swal-popup',
        title: 'custom-swal-title',
        icon: 'custom-swal-icon',
        confirmButton: 'custom-swal-button'
    },
    width: '350px',
    showClass: { popup: '' },
    didOpen: () => {
        let swalTitle = document.querySelector('.swal2-title');
        swalTitle.style.marginBottom = '0px';
        swalTitle.style.fontSize = '16px';
        swalTitle.style.fontWeight = 'bold';

        let swalContent = document.querySelector('.swal2-html-container');
        swalContent.style.marginBottom = '0px';
        swalContent.style.fontSize = '14px';

        let swalPopup = document.querySelector('.swal2-popup');
        swalPopup.style.padding = '12px';
        swalPopup.style.minHeight = '40px';
        swalPopup.style.position = 'relative';

        let swalIcon = document.querySelector('.swal2-icon');
        swalIcon.style.width = '50px';
        swalIcon.style.height = '50px';
        swalIcon.style.margin = '0px auto';
        swalIcon.style.fontSize = '11px';

        let swalButton = document.querySelector('.swal2-confirm');
        swalButton.style.padding = '6px 14px';
        swalButton.style.fontSize = '12px';
        swalButton.style.height = '30px';
        swalButton.style.width = '120px';
        swalButton.style.border = 'none';
        swalButton.style.color = '#fff';
        swalButton.style.background = 'linear-gradient(to right, rgb(5, 130, 69), rgb(2, 68, 35))';
        swalButton.style.boxShadow = '2px 2px 5px rgba(0, 0, 0, 0.2)';
        swalButton.style.borderRadius = '5px';
        swalButton.style.transition = '0.3s';

        // Efek hover tombol
        swalButton.onmouseover = () => {
            swalButton.style.background = 'linear-gradient(to right, rgb(2, 68, 35), rgb(5, 130, 69))';
            generateStars(swalButton, 3); // Bintang keluar saat hover
        };
        swalButton.onmouseout = () => {
            swalButton.style.background = 'linear-gradient(to right, rgb(5, 130, 69), rgb(2, 68, 35))';
        };

        // Efek bintang saat modal muncul
        generateStars(swalPopup, 5);
    

// Tambahkan styling untuk tombol "Batal"
let swalCancel = document.querySelector('.swal2-cancel');
if (swalCancel) {
    swalCancel.style.padding = '6px 14px';
    swalCancel.style.fontSize = '12px';
    swalCancel.style.height = '30px';
    swalCancel.style.width = '120px';
    swalCancel.style.border = 'none';
    swalCancel.style.color = '#fff';
    swalCancel.style.background = 'linear-gradient(to right, rgb(121, 4, 4), rgb(2, 68, 35))';
    swalCancel.style.boxShadow = '2px 2px 5px rgba(0, 0, 0, 0.2)';
    swalCancel.style.borderRadius = '5px';
    swalCancel.style.transition = '0.3s';

    // Efek hover tombol
    swalCancel.onmouseover = () => {
        swalCancel.style.background = 'linear-gradient(to right, rgb(121, 4, 4), rgb(5, 130, 69))';
        generateStars(swalCancel, 3); // Bintang keluar saat hover
    };
    swalCancel.onmouseout = () => {
        swalCancel.style.background = 'linear-gradient(to right, rgb(121, 4, 4), rgb(2, 68, 35))';
    };
}

generateStars(swalPopup, 5);
}
});
// Fungsi untuk menampilkan modal
function showCustomAlert() {
    customSwal.fire({
        title: 'Peringatan!',
        text: 'Lengkapi data terlebih dahulu!',
        icon: 'warning',
        confirmButtonText: 'OK'
    }).then(() => {
        console.log("Modal tertutup");
    });
}

// Fungsi untuk membuat efek bintang
function generateStars(parent, count) {
    for (let i = 0; i < count; i++) {
        let star = document.createElement("div");
        // star.innerHTML = "⭐";
        star.innerHTML = "🍃";
        // star.innerHTML = "💦";
        // star.innerHTML = "✨";
        star.style.position = "absolute";
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;
        star.style.fontSize = "16px";
        star.style.opacity = "1";
        star.style.transition = "opacity 0.5s ease-out, transform 0.5s ease-out";

        parent.appendChild(star);

        setTimeout(() => {
            star.style.opacity = "0";
            star.style.transform = "translateY(-10px)";
        }, 300);

        setTimeout(() => {
            star.remove();
        }, 800);
    }
}

// Event listener tombol
// document.getElementById('myButton').addEventListener('click', showCustomAlert);
