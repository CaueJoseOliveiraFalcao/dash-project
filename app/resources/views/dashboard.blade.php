<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<h2>🔍 Oque mais contribue pro vicio nas redes</h2>
<div style="max-width: 1080px;display: flex; justify-content: center; flex-direction: column;">
<h3>1. Uso diário internet (horas) vs Vicio em Redes</h3>
<canvas id="usageVsScoreChart"></canvas>

<h3>2. País vs Vicio em Redes</h3>
<canvas id="countryVsScoreChart"></canvas>

<h3>3. Plataforma vs Vicio em Redes</h3>
<canvas id="platformVsScoreChart"></canvas>

<h3>4. Nível acadêmico vs Vicio em Redes</h3>
<canvas id="levelVsScoreChart"></canvas>

<h3>5. Horas de sono vs Vicio em Redes</h3>
<canvas id="sleepVsScoreChart"></canvas>


<h3>6. Status de relacionamento vs Vicio em Redes</h3>
<canvas id="relationshipVsScoreChart"></canvas>
</div>


<script>
    const renderBarChart = (id, labels, data, labelText) => {
        new Chart(document.getElementById(id), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: labelText,
                    data: data,
                    backgroundColor: 'rgba(255, 159, 64, 0.6)'
                }]
            }
        });
    };

    renderBarChart('usageVsScoreChart', {!! json_encode($usageVsScore->keys()) !!}, {!! json_encode($usageVsScore->values()) !!}, 'Score médio');
    renderBarChart('countryVsScoreChart', {!! json_encode($countryVsScore->keys()) !!}, {!! json_encode($countryVsScore->values()) !!}, 'Score médio');
    renderBarChart('platformVsScoreChart', {!! json_encode($platformVsScore->keys()) !!}, {!! json_encode($platformVsScore->values()) !!}, 'Score médio');
    renderBarChart('levelVsScoreChart', {!! json_encode($levelVsScore->keys()) !!}, {!! json_encode($levelVsScore->values()) !!}, 'Score médio');
    renderBarChart('sleepVsScoreChart', {!! json_encode($sleepVsScore->keys()) !!}, {!! json_encode($sleepVsScore->values()) !!}, 'Score médio');
    renderBarChart('mentalVsScoreChart', {!! json_encode($mentalVsScore->keys()) !!}, {!! json_encode($mentalVsScore->values()) !!}, 'Score médio');
    renderBarChart('relationshipVsScoreChart', {!! json_encode($relationshipVsScore->keys()) !!}, {!! json_encode($relationshipVsScore->values()) !!}, 'Score médio');
</script>
