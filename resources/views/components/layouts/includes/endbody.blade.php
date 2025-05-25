 <!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>

<!-- Dragula js -->
<script src="{{asset('assets/libs/dragula/dragula.min.js')}}"></script>
<!-- Dragula init js-->
<script src="{{asset('assets/js/pages/dragula.init.js')}}"></script>

<!-- Plugins js -->
<script src="{{asset('assets/libs/quill/quill.min.js')}}"></script>

<!-- Init js-->
<script src="{{asset('assets/js/pages/task.init.js')}}"></script>

<!-- Sweet Alerts js -->
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.all.min.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Livewire.on('validationFailed', ({ errors }) => {
        Livewire.on('validationFailed', (errors) => {

            debugger
            if (errors.length > 0) {
                Swal.fire({
                    title: 'Erros de Validação',
                    icon: 'error',
                    html: `
                        <ul style="text-align: left;">
                            ${errors[0].map(error => `<li>${error}</li>`).join('')}
                        </ul>
                    `,
                    confirmButtonText: 'OK',
                });
            }
        });

    });
</script>
