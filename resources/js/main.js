// === Sidebar Toggle ===
document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const openSidebar = document.getElementById("openSidebar") || document.getElementById('hamburger');
    const closeSidebar = document.getElementById("closeSidebar");
    const overlay = document.getElementById('overlay');

    // Open sidebar (mobile)
    if (sidebar && openSidebar) {
        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            if (overlay) overlay.classList.remove('hidden');
        });
    }

    // Close sidebar (mobile)
    if (sidebar && closeSidebar) {
        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            if (overlay) overlay.classList.add('hidden');
        });
    }

    // Overlay click closes sidebar
    if (overlay && sidebar) {
        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    }
});

// === Dashboard Chart Example ===
import Chart from "chart.js/auto";

const initDashboardChart = () => {
    const ctx = document.getElementById("dashboardChart");
    if (!ctx) return;

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"],
            datasets: [{
                label: "Kehadiran",
                data: [80, 75, 90, 70, 85],
                backgroundColor: "#10B981",
            }],
        },
    });
};

window.addEventListener("DOMContentLoaded", initDashboardChart);
