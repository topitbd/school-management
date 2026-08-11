const initSidebarInteractions = () => {
    document.querySelectorAll("[data-sidebar-toggle]").forEach((btn) => {
        btn.addEventListener("click", () => {
            const menu = document.getElementById(btn.dataset.sidebarToggle);
            if (menu) {
                menu.classList.toggle("hidden");
            }

            const chevron = btn.querySelector("[data-sidebar-chevron]");
            if (chevron) {
                chevron.classList.toggle("rotate-180");
            }
        });
    });

    const darkModeToggle = document.getElementById("darkModeToggle");
    const darkModeIcon = document.getElementById("darkModeIcon");
    const lightModeIcon = document.getElementById("lightModeIcon");

    const updateThemeIcons = () => {
        if (!darkModeIcon || !lightModeIcon) {
            return;
        }

        const isDark = document.documentElement.classList.contains("dark");
        darkModeIcon.classList.toggle("hidden", !isDark);
        lightModeIcon.classList.toggle("hidden", isDark);
    };

    if (darkModeToggle) {
        darkModeToggle.addEventListener("click", () => {
            const isDark = document.documentElement.classList.toggle("dark");
            localStorage.setItem("theme", isDark ? "dark" : "light");
            updateThemeIcons();
        });
        updateThemeIcons();
    }

    const userDropdownToggle = document.getElementById("userDropdownToggle");
    const userDropdown = document.getElementById("userDropdown");

    if (userDropdownToggle && userDropdown) {
        userDropdownToggle.addEventListener("click", (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", () => {
            userDropdown.classList.add("hidden");
        });
    }

    const sidebar = document.getElementById("sidebar");
    const toggleSidebarMobile = (
        sidebar,
        sidebarBackdrop,
        toggleSidebarMobileHamburger,
        toggleSidebarMobileClose,
    ) => {
        if (
            !sidebar ||
            !sidebarBackdrop ||
            !toggleSidebarMobileHamburger ||
            !toggleSidebarMobileClose
        ) {
            return;
        }

        sidebar.classList.toggle("hidden");
        sidebarBackdrop.classList.toggle("hidden");
        toggleSidebarMobileHamburger.classList.toggle("hidden");
        toggleSidebarMobileClose.classList.toggle("hidden");
    };

    const toggleSidebarMobileEl = document.getElementById(
        "toggleSidebarMobile",
    );
    const sidebarBackdrop = document.getElementById("sidebarBackdrop");
    const toggleSidebarMobileHamburger = document.getElementById(
        "toggleSidebarMobileHamburger",
    );
    const toggleSidebarMobileClose = document.getElementById(
        "toggleSidebarMobileClose",
    );
    const toggleSidebarMobileSearch = document.getElementById(
        "toggleSidebarMobileSearch",
    );

    if (toggleSidebarMobileSearch) {
        toggleSidebarMobileSearch.addEventListener("click", () => {
            toggleSidebarMobile(
                sidebar,
                sidebarBackdrop,
                toggleSidebarMobileHamburger,
                toggleSidebarMobileClose,
            );
        });
    }

    if (toggleSidebarMobileEl) {
        toggleSidebarMobileEl.addEventListener("click", () => {
            toggleSidebarMobile(
                sidebar,
                sidebarBackdrop,
                toggleSidebarMobileHamburger,
                toggleSidebarMobileClose,
            );
        });
    }

    if (sidebarBackdrop) {
        sidebarBackdrop.addEventListener("click", () => {
            toggleSidebarMobile(
                sidebar,
                sidebarBackdrop,
                toggleSidebarMobileHamburger,
                toggleSidebarMobileClose,
            );
        });
    }
};

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initSidebarInteractions);
} else {
    initSidebarInteractions();
}
