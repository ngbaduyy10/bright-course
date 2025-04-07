export function showToast(type, message) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: type,
        title: message,
        showConfirmButton: false,
        showCloseButton: true,
        timer: 3000,
        customClass: {
            popup: 'custom-swal-size',
        }
    });
}