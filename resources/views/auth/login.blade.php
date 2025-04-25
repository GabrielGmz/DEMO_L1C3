<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f3f4f6; background-image: url('https://www.toptal.com/designers/subtlepatterns/patterns/double-bubble-outline.png');">
    <div style="background-color: #ffffff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 0.5rem; padding: 2rem; width: 100%; max-width: 28rem;">
        <h2 style="font-size: 1.5rem; font-weight: 700; text-align: center; margin-bottom: 1.5rem;">Iniciar sesión</h2>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div style="margin-bottom: 1rem;">
                <label for="email" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" style="margin-top: 0.25rem; display: block; width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); outline: none; focus:ring: #6366f1; focus:border-color: #6366f1;">
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label for="password" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Contraseña" style="margin-top: 0.25rem; display: block; width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); outline: none; focus:ring: #6366f1; focus:border-color: #6366f1;">
            </div>
            <button type="submit" style="width: 100%; background-color: #4f46e5; color: #ffffff; padding: 0.5rem 1rem; border-radius: 0.375rem; hover:background-color: #4338ca; outline: none; focus:ring: 2px solid #6366f1; focus:ring-offset: 2px;">
                Iniciar sesión
            </button>
        </form>
    </div>
</div>
