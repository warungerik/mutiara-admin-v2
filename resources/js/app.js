import { animate, inView, stagger } from 'motion';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Swal = Swal;

window.showToast = function (message, icon = 'success', title = null) {
    const isDark = document.documentElement.classList.contains('dark');
    return Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: icon,
        title: title || message,
        text: title ? message : undefined,
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
        background: isDark ? '#0f172a' : '#ffffff',
        color: isDark ? '#f8fafc' : '#0f172a',
        customClass: {
            popup: 'rounded-2xl border border-slate-200/80 dark:border-slate-800/80 shadow-2xl text-xs font-medium p-3.5',
            title: 'text-xs font-semibold text-slate-900 dark:text-white',
            htmlContainer: 'text-[11px] text-slate-500 dark:text-slate-400 mt-0.5',
        },
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        },
    });
};

window.showConfirm = function (title, text, confirmText = 'Ya, Lanjutkan', cancelText = 'Batal', icon = 'warning') {
    const isDark = document.documentElement.classList.contains('dark');
    return Swal.fire({
        title: title || 'Konfirmasi Tindakan',
        text: text || 'Apakah Anda yakin ingin melanjutkan?',
        icon: icon,
        showCancelButton: true,
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
        reverseButtons: true,
        buttonsStyling: false,
        background: isDark ? '#0f172a' : '#ffffff',
        color: isDark ? '#f8fafc' : '#0f172a',
        customClass: {
            popup: 'rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-2xl p-6 text-slate-800 dark:text-slate-100',
            title: 'text-base font-bold text-slate-900 dark:text-white mb-2',
            htmlContainer: 'text-xs text-slate-500 dark:text-slate-400 leading-relaxed mb-4',
            confirmButton: 'px-4 py-2.5 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white transition-all shadow-xs cursor-pointer focus:outline-hidden',
            cancelButton: 'px-4 py-2.5 rounded-xl text-xs font-semibold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all cursor-pointer focus:outline-hidden',
        },
    });
};

window.alert = function (message, title = 'Informasi', icon = 'info') {
    const isDark = document.documentElement.classList.contains('dark');
    return Swal.fire({
        title: title,
        text: message,
        icon: icon,
        confirmButtonText: 'Mengerti',
        buttonsStyling: false,
        background: isDark ? '#0f172a' : '#ffffff',
        color: isDark ? '#f8fafc' : '#0f172a',
        customClass: {
            popup: 'rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-2xl p-6',
            title: 'text-base font-bold text-slate-900 dark:text-white mb-2',
            htmlContainer: 'text-xs text-slate-600 dark:text-slate-300 font-medium leading-relaxed mb-4',
            confirmButton: 'px-5 py-2.5 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white transition-all shadow-xs cursor-pointer focus:outline-hidden',
        },
    });
};

window.confirm = function (message) {
    return window.showConfirm('Konfirmasi', message);
};

document.addEventListener('DOMContentLoaded', () => {
    const staggerItems = document.querySelectorAll('[data-motion="stagger-item"]');
    if (staggerItems.length > 0) {
        animate(
            staggerItems,
            { opacity: [0, 1], y: [16, 0] },
            {
                delay: stagger(0.06),
                duration: 0.4,
                easing: [0.25, 1, 0.5, 1],
            }
        );
    }

    const fadeUps = document.querySelectorAll('[data-motion="fade-up"]');
    if (fadeUps.length > 0) {
        animate(
            fadeUps,
            { opacity: [0, 1], y: [20, 0] },
            { duration: 0.45, easing: [0.22, 1, 0.36, 1] }
        );
    }

    const tapElements = document.querySelectorAll('button, [data-motion="tap"], a.inline-flex');
    tapElements.forEach((el) => {
        el.addEventListener('pointerdown', () => {
            animate(el, { scale: 0.96 }, { duration: 0.1 });
        });
        el.addEventListener('pointerup', () => {
            animate(el, { scale: 1 }, { duration: 0.15, easing: 'spring(1, 100, 10, 0)' });
        });
        el.addEventListener('pointerleave', () => {
            animate(el, { scale: 1 }, { duration: 0.15 });
        });
    });

    inView('[data-motion="in-view"]', ({ target }) => {
        animate(
            target,
            { opacity: [0, 1], y: [24, 0] },
            { duration: 0.5, easing: [0.16, 1, 0.3, 1] }
        );
    });

    const chartBars = document.querySelectorAll('[data-motion="chart-bar"]');
    if (chartBars.length > 0) {
        chartBars.forEach((bar, idx) => {
            const finalHeight = bar.getAttribute('data-height') || '50%';
            bar.style.height = '0%';
            setTimeout(() => {
                bar.style.transition = 'height 0.7s cubic-bezier(0.16, 1, 0.3, 1)';
                bar.style.height = finalHeight;
            }, 100 + idx * 60);
        });
    }
});

window.motionAnimate = animate;

