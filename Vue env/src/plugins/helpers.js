import { useToast } from 'vue-toast-notification';
import Swal from 'sweetalert2';

export const toastAlert = (type, message, duration = 4000) => {

    const $toast = useToast();
    const options = {
        position: 'top-right',
        duration: duration,
        dismissible: true,
        queue: true,
        pauseOnHover: true,
        pauseOnFocusLoss: true,
        progressBar: true,
    };

    switch (type) {
        case 'info':
            return $toast.info(message, options);
        case 'success':
            return $toast.success(message, options);
        case 'warning':
            return $toast.warning(message, options);
        case 'error':
            return $toast.error(message, options);
        default:
            return $toast.error('Something went wrong', options);
    }
};

export const confirmAndDelete = async (options = {}) => {
    const {
        title = "Are you sure?",
        text = "You won't be able to revert this!",
        confirmButtonText = "Yes, delete it!",
        confirmButtonColor = "#3085d6",
        cancelButtonColor = "#d33",
    } = options;
    const result = await Swal.fire({
        title,
        text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor,
        cancelButtonColor,
        confirmButtonText
    });
    return result.isConfirmed;
};
export default class helpers {
}