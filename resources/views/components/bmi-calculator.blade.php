<div class="bmi-calculator">
    <form id="bmiForm">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="height" class="form-label">Tinggi Badan (cm)</label>
                <input type="number" class="form-control" id="height" min="100" max="250" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="weight" class="form-label">Berat Badan (kg)</label>
                <input type="number" class="form-control" id="weight" min="30" max="300" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Hitung BMI</button>
    </form>

    <div class="mt-3 text-center" id="bmiResult">
        <!-- Result will appear here -->
    </div>

    <div class="mt-3">
        <small class="text-muted">
            <strong>Kategori BMI:</strong><br>
            <span class="text-danger">Kurus: < 18.5</span> |
            <span class="text-success">Normal: 18.5-24.9</span> |
            <span class="text-warning">Gemuk: 25-29.9</span> |
            <span class="text-danger">Obesitas: ≥ 30</span>
        </small>
    </div>
</div>

<script>
    document.getElementById('bmiForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const height = parseFloat(document.getElementById('height').value) / 100; // Convert to meters
        const weight = parseFloat(document.getElementById('weight').value);

        if (height > 0 && weight > 0) {
            const bmi = weight / (height * height);
            let category = '';
            let color = '';

            if (bmi < 18.5) {
                category = 'Kurus';
                color = 'danger';
            } else if (bmi < 25) {
                category = 'Normal';
                color = 'success';
            } else if (bmi < 30) {
                category = 'Gemuk';
                color = 'warning';
            } else {
                category = 'Obesitas';
                color = 'danger';
            }

            document.getElementById('bmiResult').innerHTML = `
                <div class="alert alert-${color}">
                    <h5>BMI Anda: ${bmi.toFixed(1)}</h5>
                    <p><strong>Kategori: ${category}</strong></p>
                </div>
            `;
        }
    });
</script>
