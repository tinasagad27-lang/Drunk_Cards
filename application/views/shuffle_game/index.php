<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shuffle Game</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/index.css') ?>">
</head>

<body>

    <nav>
        <ul class="nav justify-content-center p-3">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('shuffle_game_controller'); ?>">
                    Shuffle Game
                </a>
            </li>
        </ul>
    </nav>

    <div class="container text-center fade-in">

        <h1 class="mb-4">Drunk Cards Game</h1>

        <form
            action="<?= site_url('shuffle_game_controller/shuffle'); ?>"
            method="POST"
            id="shuffleForm"
        >

            <div class="form-group text-left">

                <label for="category">
                    Select Category:
                </label>

                <select
                    class="form-control"
                    id="category"
                    name="category"
                    required
                >

                    <option value="">
                        -- Select a Category --
                    </option>

                    <option value="+18 adults question">
                        +18 Adults
                    </option>

                    <option value="drunk question">
                        Drunk Question
                    </option>

                    <option value="comfort question">
                        Comfort Question
                    </option>

                    <option value="for single only question">
                        For Single Only
                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="btn btn-primary mt-4"
            >
                Start Game
            </button>

        </form>

        <a
            href="<?= site_url('welcome'); ?>"
            class="btn btn-secondary mt-3"
        >
            Back to Main Menu
        </a>

    </div>


    <div
    class="modal fade"
    id="adultPasswordModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="adultPasswordModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-dialog-centered"
        role="document"
    >

        <div class="modal-content bg-dark text-light border-0 rounded-lg shadow">

            <div class="modal-header border-secondary">

                <h5
                    class="modal-title font-weight-bold"
                    id="adultPasswordModalLabel"
                >
                    🔒 Security Verification
                </h5>

                <button
                    type="button"
                    class="close text-light"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>


            <div class="modal-body px-4 py-4">

                <p class="text-muted mb-4">
                   Enter the password to access the <a href="https://github.com/tinasagad27-lang/Drunk_Cards/blob/main/password%20%2B18%20adult%20question" target="_blank" rel="noopener noreferrer">18+ Adult Questions</a>.

                </p>

                <div class="form-group mb-0">

                    <label
                        for="adultPassword"
                        class="font-weight-bold"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        class="form-control bg-dark text-light border-secondary rounded-pill"
                        id="adultPassword"
                        placeholder="Enter password"
                        autocomplete="off"
                    >

                    <small
                        id="passwordError"
                        class="text-danger d-none"
                    >
                        Incorrect password.
                    </small>

                </div>

            </div>


            <div class="modal-footer border-secondary justify-content-center">

                <button
                    type="button"
                    class="btn btn-secondary rounded-pill px-4 font-weight-bold"
                    data-dismiss="modal"
                >
                    Cancel
                </button>

                <button
                    type="button"
                    class="btn btn-info rounded-pill px-4 font-weight-bold"
                    id="verifyAdultPassword"
                >
                    🔓 Verify & Continue
                </button>

            </div>

        </div>

    </div>

</div>


    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this card?');
        }

        const toggleBtn = document.getElementById('toggleTable');

        if (toggleBtn) {
            toggleBtn.addEventListener('click', function () {

                var table = document.getElementById('cardsTable');

                if (table.style.display === 'none') {
                    table.style.display = 'block';
                } else {
                    table.style.display = 'none';
                }

            });
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const form = document.getElementById('shuffleForm');
            const category = document.getElementById('category');
            const passwordInput = document.getElementById('adultPassword');
            const passwordError = document.getElementById('passwordError');
            const verifyButton = document.getElementById('verifyAdultPassword');

            let adultVerified = false;


            form.addEventListener('submit', function (e) {

                if (
                    category.value === '+18 adults question' &&
                    !adultVerified
                ) {

                    e.preventDefault();

                    passwordInput.value = '';
                    passwordError.classList.add('d-none');

                    $('#adultPasswordModal').modal('show');

                }

            });


            verifyButton.addEventListener('click', function () {

                const password = passwordInput.value.trim();

                if (password === '') {

                    passwordError.textContent =
                        'Please enter the password.';

                    passwordError.classList.remove('d-none');

                    passwordInput.focus();

                    return;
                }


                verifyButton.disabled = true;
                verifyButton.textContent = '⏳ Verifying...';


                const formData = new FormData();

                formData.append('password', password);


                fetch(
                    '<?= site_url("shuffle_game_controller/verify_adult"); ?>',
                    {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }
                )

                .then(function (response) {

                    if (!response.ok) {
                        throw new Error('Server error');
                    }

                    return response.json();

                })

                .then(function (data) {

                    if (data.success === true) {

                        adultVerified = true;

                        passwordError.classList.add('d-none');

                        $('#adultPasswordModal').modal('hide');

                        form.submit();

                    } else {

                        passwordError.textContent =
                            'Incorrect password.';

                        passwordError.classList.remove('d-none');

                        passwordInput.value = '';

                        passwordInput.focus();

                    }

                })

                .catch(function () {

                    passwordError.textContent =
                        'Verification failed. Please try again.';

                    passwordError.classList.remove('d-none');

                })

                .finally(function () {

                    verifyButton.disabled = false;

                    verifyButton.textContent =
                        '🔓 Verify & Continue';

                });

            });


            passwordInput.addEventListener('keypress', function (e) {

                if (e.key === 'Enter') {

                    e.preventDefault();

                    verifyButton.click();

                }

            });


            $('#adultPasswordModal').on(
                'shown.bs.modal',
                function () {

                    passwordInput.focus();

                }
            );

        });
    </script>

</body>
</html>
