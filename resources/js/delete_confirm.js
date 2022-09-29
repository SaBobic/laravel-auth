const forms = document.querySelectorAll(".delete-form");

forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
        const hasConfirmed = confirm(
            "Sei sicuro di vol eliminare questo articolo?"
        );
        e.preventDefault();
        if (hasConfirmed) form.submit();
    });
});
