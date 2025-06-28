document.addEventListener("DOMContentLoaded", function () {
    const serviceSelect = document.getElementById("service");
    const previewBox = document.getElementById("servicePreview");
    const previewImg = document.getElementById("previewImg");
    const previewTitle = document.getElementById("previewTitle");
    const previewDesc = document.getElementById("previewDesc");
    const previewPrice = document.getElementById("previewPrice");
    const previewDuration = document.getElementById("previewDuration");
    const selectedServiceName = document.getElementById("selectedServiceName");

    serviceSelect.addEventListener("change", function () {
        const selected = this.selectedOptions[0];
        if (selected) {
            previewBox.classList.remove("d-none");
            previewImg.src = selected.dataset.img;
            previewTitle.textContent = selected.dataset.title;
            previewDesc.textContent = selected.dataset.desc;
            previewPrice.textContent = selected.dataset.price;
            previewDuration.textContent = selected.dataset.duration;
            selectedServiceName.value = selected.value;
        }
    });

    const form = document.getElementById("create_book");

    if (form) {
        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const data = {
                service_name: selectedServiceName.value,
                appointment_date: document.getElementById("date").value,
                appointment_time: document.getElementById("time").value,
                notes: document.getElementById("notes").value,
            };

            const token = document.querySelector(
                'meta[name="csrf-token"]'
            ).content;

            const loadingModal = new bootstrap.Modal(
                document.getElementById("loadingModal")
            );
            const successModal = new bootstrap.Modal(
                document.getElementById("successModal")
            );
            const messageEl = document.getElementById("successMessage");

            loadingModal.show();

            try {
                const response = await fetch("/create-book", {
                    method: "POST",
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": token,
                    },
                    body: JSON.stringify(data),
                });

                const result = await response.json();

                if (!response.ok) {
                    alert(result.message || "Something went wrong.");
                    return;
                }

                messageEl.textContent =
                    result.message || "Booking created successfully!";
                successModal.show();

                setTimeout(() => {
                    window.location.href = "/dashboard";
                }, 3000);
            } catch (error) {
                alert("Internal error occurred.");
            } finally {
                loadingModal.hide();
            }
        });
    }
});
