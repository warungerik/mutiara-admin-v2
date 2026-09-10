<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminTemplateTest extends TestCase
{
    public function test_root_redirects_to_dashboard(): void
    {
        $this->get('/')->assertRedirect('/admin/dashboard');
    }

    public function test_dashboard_renders_successfully(): void
    {
        $this->get(route('admin.dashboard'))
            ->assertStatus(200)
            ->assertSee('Dashboard')
            ->assertSee('MUTIARA ADMIN');
    }

    public function test_users_table_renders_successfully(): void
    {
        $this->get(route('admin.users.index'))
            ->assertStatus(200)
            ->assertSee('Pengguna')
            ->assertSee('Alfi Pratama');
    }

    public function test_user_create_form_renders_successfully(): void
    {
        $this->get(route('admin.users.create'))
            ->assertStatus(200)
            ->assertSee('Tambah Pengguna')
            ->assertSee('Nama Lengkap');
    }

    public function test_user_store_redirects(): void
    {
        $response = $this->post(route('admin.users.store'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'Editor',
        ]);
        $response->assertRedirect(route('admin.users.index'));
        $response->assertSessionHas('success');
    }

    public function test_settings_page_renders(): void
    {
        $this->get(route('admin.settings'))
            ->assertStatus(200)
            ->assertSee('Pengaturan');
    }

    public function test_components_page_renders(): void
    {
        $this->get(route('admin.components'))
            ->assertStatus(200)
            ->assertSee('Komponen');
    }

    public function test_analytics_page_renders(): void
    {
        $this->get(route('admin.analytics'))
            ->assertStatus(200)
            ->assertSee('Analytics & Laporan')
            ->assertSee('Sumber Trafik');
    }

    public function test_orders_page_renders(): void
    {
        $this->get(route('admin.orders'))
            ->assertStatus(200)
            ->assertSee('Transaksi & Pesanan')
            ->assertSee('ORD-2026-108');
    }

    public function test_products_page_renders(): void
    {
        $this->get(route('admin.products'))
            ->assertStatus(200)
            ->assertSee('Katalog Produk')
            ->assertSee('Mutiara Admin Laravel V2');
    }

    public function test_profile_page_renders(): void
    {
        $this->get(route('admin.profile'))
            ->assertStatus(200)
            ->assertSee('Profil Saya')
            ->assertSee('Alfi Pratama');
    }

    public function test_notifications_page_renders(): void
    {
        $this->get(route('admin.notifications'))
            ->assertStatus(200)
            ->assertSee('Pusat Notifikasi')
            ->assertSee('Pembayaran Berhasil Diverifikasi');
    }

    public function test_auth_pages_render(): void
    {
        $this->get(route('login'))->assertStatus(200)->assertSee('Masuk')->assertSee('togglePasswordVisibility');
        $this->get(route('register'))->assertStatus(200)->assertSee('Daftar')->assertSee('togglePasswordVisibility');
        $this->get(route('password.request'))->assertStatus(200)->assertSee('Lupa Sandi');
    }

    public function test_custom_404_renders_on_unknown_url(): void
    {
        $this->get('/halaman-yang-pasti-tidak-ada')
            ->assertStatus(404)
            ->assertSee('Halaman Tidak Ditemukan');
    }
}
