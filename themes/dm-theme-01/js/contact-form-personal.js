
document.addEventListener("DOMContentLoaded", function() {

// Contact Form Steps
    var form = document.getElementById('dm-form');

    if (form.getAttribute('data-form-type') === "steps") {
        var steps = form.querySelectorAll('.step');

        steps.forEach(function(step) {
            step.setAttribute('data-toggle-animation', 'collapse'); // Set the toggle animation attribute
            step.setAttribute('data-display', 'hide'); // Set the display attribute to hide
        });

        var currentStepIndex = 0;
        steps[currentStepIndex].setAttribute('data-display', 'show'); // Show the first step

        function showStep(stepIndex) {
            steps.forEach(function(step) {
                step.setAttribute('data-display', 'hide'); // Hide all steps
            });
            if (steps[stepIndex]) {
                steps[stepIndex].setAttribute('data-display', 'show'); // Show the specified step
            }
        }

        form.addEventListener('click', function(event) {
            var target = event.target;

            if (target.getAttribute('data-action') === 'next-step') {
                var nextStep = parseInt(target.getAttribute('data-step'));
                if (isNaN(nextStep)) {
                    var radioName = target.getAttribute('data-step');
                    var checkedRadio = form.querySelector('input[name="' + radioName + '"]:checked');

                    if (checkedRadio) {
                        nextStep = parseInt(checkedRadio.getAttribute('data-step'));
                    } else {
                        alert('Please select an option to proceed.');
                        return;
                    }
                }
                showStep(nextStep - 1);
            }

            if (target.getAttribute('data-action') === 'prev-step') {
                var prevStep = parseInt(target.getAttribute('data-step'));
                if (prevStep >= 1) {
                    showStep(prevStep - 1);
                }
            }
        });
    }
});



// Contact Form
function contact_form_exec() {
    var form = document.getElementById('dm-form');
    var externalFormUrl = form.getAttribute('data-external-form-url');
    var formFields = form.querySelectorAll('[field-name-extern]');
    var statusMessageSpan = document.querySelector('#dm-send-status');
    var buttonDiv = document.querySelector('#dm-form-button').parentNode;
    var statusMessage = "The form is inactive. Please use alternative contact methods.";

    updateFormFields(form);

    if (externalFormUrl) {
        var formParams = new URLSearchParams();

        formFields.forEach(function(field) {
            var fieldGoogleName = field.getAttribute('field-name-extern');
            var fieldValue = field.value;

            if (fieldGoogleName) {
                formParams.append(fieldGoogleName, fieldValue);
            }
        });

        var fullUrl = externalFormUrl + '?' + formParams.toString();

        window.open(fullUrl, '_blank');
        statusMessage = "You will be redirected to another external form address.";
    }

    if (!statusMessageSpan) {
        statusMessageSpan = document.createElement('span');
        statusMessageSpan.id = 'dm-send-status';
        statusMessageSpan.innerHTML = statusMessage;
        buttonDiv.appendChild(statusMessageSpan);

        return false;
    }
}

function updateFormFields(form) {
    var stepFields = form.querySelectorAll('[field-name-step]');
    stepFields.forEach(function(field) {
        var stepFieldName = field.getAttribute('field-name-step');
        var stepFieldValue = '';

        if (field.tagName.toLowerCase() === 'textarea') {
            stepFieldValue = field.value.trim();
        } else if (field.type === 'radio' && field.checked) {
            stepFieldValue = field.value;
        } else if (field.type === 'text') {
            stepFieldValue = field.value.trim();
        }

        if (stepFieldValue) {
            var externalField = form.querySelector(`[name="${stepFieldName}"]`);

            if (externalField) {
                if (externalField.tagName.toLowerCase() === 'textarea') {
                    var stepFieldPlaceholder = field.placeholder || stepFieldName;
                    externalField.value += stepFieldPlaceholder + ": " + stepFieldValue + "\n";
                } else {
                    externalField.value = stepFieldValue;
                }
            } else {
                console.error(`No external field found for: ${stepFieldName}`);
            }
        }
    });
}

