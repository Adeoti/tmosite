$cssFiles = Get-ChildItem -Path ".\resources\css" -Filter "*.css" -Recurse

$rgbaReplacements = @(
    @{ Find = 'rgba\(\s*200,\s*169,\s*107\s*,'; Replace = 'rgba(var(--color-gold-rgb),' }
    @{ Find = 'rgba\(\s*225,\s*201,\s*141\s*,'; Replace = 'rgba(var(--color-gold-bright-rgb),' }
    @{ Find = 'rgba\(\s*16,\s*42,\s*67\s*,'; Replace = 'rgba(var(--color-navy-rgb),' }
    @{ Find = 'rgba\(\s*13,\s*42,\s*67\s*,'; Replace = 'rgba(var(--color-navy-rgb),' }
    @{ Find = 'rgba\(\s*77,\s*139,\s*112\s*,'; Replace = 'rgba(var(--color-green-rgb),' }
    @{ Find = 'rgba\(\s*35,\s*91,\s*68\s*,'; Replace = 'rgba(var(--color-green-rgb),' }
    @{ Find = 'rgba\(\s*201,\s*168,\s*76\s*,'; Replace = 'rgba(var(--color-chat-accent-rgb),' }
    @{ Find = 'rgba\(\s*244,\s*241,\s*232\s*,'; Replace = 'rgba(var(--color-chat-text-rgb),' }
    @{ Find = 'rgba\(\s*16,\s*21,\s*19\s*,'; Replace = 'rgba(var(--color-chat-bg-rgb),' }
    @{ Find = 'rgba\(\s*255,\s*255,\s*255\s*,'; Replace = 'rgba(var(--color-white-rgb),' }
    @{ Find = 'rgba\(\s*178,\s*58,\s*58\s*,'; Replace = 'rgba(var(--color-status-error-rgb),' }
    @{ Find = 'rgba\(\s*0,\s*0,\s*0\s*,'; Replace = 'rgba(var(--color-black-rgb),' }
)

$hexReplacements = @(
    @{ Find = '#1d8f62'; Replace = 'var(--color-whatsapp-bright)' }
    @{ Find = '#24a872'; Replace = 'var(--color-whatsapp-brighter)' }
    @{ Find = '#128c7e'; Replace = 'var(--color-whatsapp)' }
    @{ Find = '#7a2626'; Replace = 'var(--color-status-error-text-dark)' }
    @{ Find = '#fef3e2'; Replace = 'var(--color-status-warning-bg)' }
    @{ Find = '#b54708'; Replace = 'var(--color-status-warning-text)' }
    @{ Find = '#e7f6ec'; Replace = 'var(--color-status-success-bg)' }
    @{ Find = '#1b5e20'; Replace = 'var(--color-status-success-text)' }
    @{ Find = '#fdecec'; Replace = 'var(--color-status-error-bg)' }
    @{ Find = '#b42318'; Replace = 'var(--color-status-error-text)' }
    @{ Find = '#f2f4f7'; Replace = 'var(--color-status-neutral-bg)' }
    @{ Find = '#667085'; Replace = 'var(--color-status-neutral-text)' }
    @{ Find = '#101513'; Replace = 'var(--color-chat-bg)' }
    @{ Find = '#0f3d2e'; Replace = 'var(--color-chat-header)' }
    @{ Find = '#f4f1e8'; Replace = 'var(--color-chat-text)' }
    @{ Find = '#c9a84c'; Replace = 'var(--color-chat-accent)' }
    @{ Find = '#8b1a4a'; Replace = 'var(--color-chat-badge)' }
)

foreach ($file in $cssFiles) {

    if ($file.Name -eq "variables.css") {
        continue
    }

    $content = Get-Content -Path $file.FullName -Raw
    $original = $content

    foreach ($rule in $rgbaReplacements) {
        $content = $content -replace $rule.Find, $rule.Replace
    }

    foreach ($rule in $hexReplacements) {
        $content = $content -replace [regex]::Escape($rule.Find), $rule.Replace
    }

    if ($content -ne $original) {
        Set-Content -Path $file.FullName -Value $content -NoNewline
        Write-Host "Updated: $($file.FullName)"
    }
}

Write-Host "Done."