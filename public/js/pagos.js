// public/js/pagos.js

async function verDetalle(id) {
    try {
        const res = await fetch("/pagos/" + id);
        if (!res.ok) throw new Error("Error al obtener pago");

        const data = await res.json();

        // rellenar campos
        document.getElementById("detalle-codigo").textContent =
            data.codigo || data.id;
        document.getElementById("detalle-cliente").textContent =
            data.cliente || "";
        document.getElementById("detalle-producto").textContent =
            data.producto || "";
        document.getElementById("detalle-tipo").textContent = data.tipo || "";
        document.getElementById("detalle-fecha").textContent =
            data.fecha_pago || "";
        document.getElementById("detalle-min").textContent =
            data.monto_minimo || "";
        document.getElementById("detalle-max").textContent =
            data.monto_maximo || "";

        // ajustar href del descargar
        const btnDesc = document.getElementById("btn-descargar");
        btnDesc.setAttribute("href", "/pagos/" + id + "/pdf");

        // mostrar popup
        const popup = document.getElementById("popup");
        popup.classList.remove("hidden");
        popup.setAttribute("aria-hidden", "false");
    } catch (err) {
        console.error(err);
        alert("No se pudo cargar el detalle del pago.");
    }
}

function cerrarPopup() {
    const popup = document.getElementById("popup");
    popup.classList.add("hidden");
    popup.setAttribute("aria-hidden", "true");
}
