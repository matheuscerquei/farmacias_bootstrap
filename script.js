function filterOptions() {
    const input = document.getElementById('medicamentosInput');
    const filter = input.value.toUpperCase();
    const select = document.getElementById('medicamentosSelect');
    const options = select.getElementsByTagName('option');

    for (let i = 0; i < options.length; i++) {
        const option = options[i];
        if (option.value && option.value.toUpperCase().indexOf(filter) > -1) {
            option.classList.remove('hidden');
        } else {
            option.classList.add('hidden');
        }
    }
}