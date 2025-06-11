<footer class="footer">
    <div class="footer-content">
        <span class="text-text-light">&copy; {{ date('Y') }} Meet & Music. Todos os direitos reservados.</span>
    </div>
</footer>

<style>
.footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100vw;
    z-index: 100;
    background: rgba(15, 15, 19, 0.8);
    border-top: 1px solid var(--border);
    padding: 1rem 0;
    margin: 0;
    max-width: none;
}
.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
@media (max-width: 768px) {
    .footer-content {
        padding: 0 1rem;
    }
}
</style>
