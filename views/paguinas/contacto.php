<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jog" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" width="500" height="300" alt="Imagen Contacto">
    </picture>
    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="nombre">Nombre:</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" >

            <label for="email">E-mail:</label>
            <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" >

            <label for="telefono">Teléfono:</label>
            <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]" >

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]" ></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select id="opciones" name="contacto[tipo]" >
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>

            <label for="Presupuesto">Precio o Presupuesto:</label>
            <input type="number" placeholder="Tu Precio o Presupuesto:" id="presupuesto" name="contacto[precio]" >
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser Contactado:</p>
            <div class="forma-contacto">
                <label for="contactar-email">Teléfono:</label>
                <input  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" >

                <label for="contactar-telefono">E-mail:</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" >
            </div>

            <p>Si eliguió teléfono, elija la fécha y la hora</p>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde" >
    </form>
</main>