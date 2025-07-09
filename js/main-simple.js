import { initMenu } from './menu.js';
import { contenido } from './contenido.js';
import { indicadores } from './indicadores.js';

document.addEventListener("DOMContentLoaded", () => {
  initMenu();
  indicadores();
  contenido();
});
