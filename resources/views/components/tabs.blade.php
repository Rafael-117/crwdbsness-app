<script>
    let currentTab = 1;
    const tabContents = document.querySelectorAll('.tab-pane');
    const btnBack = document.getElementById('btnBack');
    const btnNext = document.getElementById('btnNext');

    function showTab(index) {
        for (const tabContent of tabContents) {
            tabContent.style.display = 'none';
        }
        tabContents[index].style.display = 'block';
    }

    function validateInputs() {
        const currentTabContent = tabContents[currentTab - 1];
        const inputs = currentTabContent.querySelectorAll('input');
        for (const input of inputs) {
            if (input.type != 'file') {
                console.log(input)
                if (!input.value.trim()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Por favor, complete todos los campos antes de cambiar de pestaña.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    return false;
                }
            }

        }
        return true;
    }

    function updateButtonVisibility() {
        btnBack.style.display = currentTab === 1 ? 'none' : 'block';
        btnNext.style.display = currentTab === tabContents.length ? 'none' : 'block';
    }

    function changeTab(direction) {
        if (direction === 1 && !validateInputs()) {
            return;
        }

        const newIndex = currentTab + direction;
        if (newIndex >= 1 && newIndex <= tabContents.length) {
            currentTab = newIndex;
            showTab(currentTab - 1);
            updateButtonVisibility();
        }
    }

    updateButtonVisibility();
    showTab(currentTab - 1);
</script>
