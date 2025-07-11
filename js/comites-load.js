async function cargarComites() {
  const res = await fetch(`./data/comites.json`);
  const comites = await res.json();
  const container = document.getElementById('comites-container');

  comites.forEach(comite => {
    const div = document.createElement('div');
    div.classList.add('comite-box');
    div.innerHTML = `
      <h4 class="titulo-carrera">${comite.carrera.toUpperCase()}</h4>
      <table class="tabla-comite">
        ${comite.miembros.map(m => `
          <tr>
            <td>${m.rol}</td>
            <td>${m.nombre}</td>
          </tr>
        `).join('')}
      </table>
    `;
    container.appendChild(div);
  });
}

document.addEventListener('DOMContentLoaded', cargarComites);
