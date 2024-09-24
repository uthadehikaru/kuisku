<div>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Daftar Sekarang!</h1>
                <p class="py-6">Selamat datang! Silakan daftarkan diri Anda untuk membuat akun baru.</p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form wire:submit.prevent="register" class="card-body">
                    
                    @if (session()->has('error'))       
                        <div class="alert alert-error shadow-lg">
                            <div class="flex items-center">
                                <span>{{ session('error') }}</span>
                            </div>
                        </div>
                    @endif
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama</span>
                        </label>
                        <input type="text" placeholder="Nama Lengkap" class="input input-bordered" wire:model="name" required />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" placeholder="Email" class="input input-bordered" wire:model="email" required />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Kata Sandi</span>
                        </label>
                        <input type="password" placeholder="Kata Sandi" class="input input-bordered" wire:model="password" required />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Konfirmasi Kata Sandi</span>
                        </label>
                        <input type="password" placeholder="Konfirmasi Kata Sandi" class="input input-bordered" wire:model="password_confirmation" required />
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
                <div class="card-actions justify-center text-sm py-4">
                    <p>Sudah punya akun?</p>
                    <a href="{{ route('login') }}" class="link link-hover text-primary">Masuk sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
