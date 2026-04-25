<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Remote Falcon – FPP Plugin Help</title>
<style>
  :root {
    --bg:        #0d1117;
    --surface:   #161b22;
    --surface2:  #21262d;
    --border:    #30363d;
    --accent:    #e05c2d;
    --accent2:   #f0883e;
    --blue:      #58a6ff;
    --green:     #3fb950;
    --yellow:    #d29922;
    --red:       #f85149;
    --text:      #e6edf3;
    --muted:     #8b949e;
    --heading:   #f0f6fc;
    --radius:    8px;
    --font-mono: 'Courier New', Courier, monospace;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    background: var(--bg);
    color: var(--text);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
    font-size: 14px;
    line-height: 1.65;
    min-height: 100vh;
  }

  /* ── Layout ── */
  .layout { display: flex; min-height: 100vh; }

  /* ── Sidebar ── */
  .sidebar {
    width: 260px;
    min-width: 260px;
    background: var(--surface);
    border-right: 1px solid var(--border);
    padding: 24px 0;
    position: sticky;
    top: 0;
    height: 100vh;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: var(--border) transparent;
  }

  .sidebar-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0 20px 20px;
    border-bottom: 1px solid var(--border);
    margin-bottom: 16px;
  }

  .logo-icon {
    width: 32px; height: 32px;
    background: var(--accent);
    border-radius: 6px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
  }

  .logo-text { font-weight: 700; font-size: 14px; color: var(--heading); line-height: 1.2; }
  .logo-sub  { font-size: 11px; color: var(--muted); }

  .nav-section { margin-bottom: 8px; }

  .nav-label {
    padding: 4px 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: var(--muted);
    margin-bottom: 2px;
  }

  .nav-item {
    display: block;
    padding: 6px 20px;
    color: var(--muted);
    text-decoration: none;
    border-left: 2px solid transparent;
    transition: all .15s;
    font-size: 13px;
    cursor: pointer;
  }
  .nav-item:hover, .nav-item.active {
    color: var(--text);
    border-left-color: var(--accent);
    background: rgba(224,92,45,.08);
  }

  /* ── Main ── */
  .main {
    flex: 1;
    padding: 40px 48px;
    max-width: 900px;
    overflow-y: auto;
  }

  /* ── Sections ── */
  .section { display: none; }
  .section.active { display: block; }

  /* ── Typography ── */
  h1 {
    font-size: 26px; font-weight: 700;
    color: var(--heading);
    border-bottom: 1px solid var(--border);
    padding-bottom: 12px;
    margin-bottom: 24px;
  }
  h2 {
    font-size: 18px; font-weight: 600;
    color: var(--heading);
    margin: 32px 0 12px;
    padding-bottom: 6px;
    border-bottom: 1px solid var(--border);
  }
  h3 {
    font-size: 14px; font-weight: 600;
    color: var(--accent2);
    margin: 20px 0 8px;
    text-transform: uppercase;
    letter-spacing: .04em;
    font-size: 12px;
  }
  p { margin-bottom: 12px; color: var(--text); }
  strong { color: var(--heading); }
  code {
    font-family: var(--font-mono);
    background: var(--surface2);
    border: 1px solid var(--border);
    border-radius: 4px;
    padding: 1px 5px;
    font-size: 12px;
    color: var(--accent2);
  }

  /* ── Cards ── */
  .card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 20px;
    margin-bottom: 16px;
  }
  .card-title {
    font-weight: 600;
    color: var(--heading);
    margin-bottom: 6px;
    font-size: 14px;
  }
  .card p { margin-bottom: 0; font-size: 13px; color: var(--muted); }

  /* ── Callouts ── */
  .callout {
    border-radius: var(--radius);
    padding: 14px 16px;
    margin: 16px 0;
    border-left: 3px solid;
    font-size: 13px;
  }
  .callout-warn  { background: rgba(210,153,34,.1);  border-color: var(--yellow); }
  .callout-info  { background: rgba(88,166,255,.1);  border-color: var(--blue); }
  .callout-tip   { background: rgba(63,185,80,.1);   border-color: var(--green); }
  .callout-error { background: rgba(248,81,73,.1);   border-color: var(--red); }

  .callout-label {
    font-weight: 700;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .06em;
    margin-bottom: 4px;
  }
  .callout-warn  .callout-label { color: var(--yellow); }
  .callout-info  .callout-label { color: var(--blue); }
  .callout-tip   .callout-label { color: var(--green); }
  .callout-error .callout-label { color: var(--red); }

  /* ── Checklist ── */
  .checklist { list-style: none; margin: 12px 0 20px; }
  .checklist li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 8px 12px;
    border-radius: 6px;
    margin-bottom: 4px;
    background: var(--surface);
    border: 1px solid var(--border);
    font-size: 13px;
    cursor: pointer;
    transition: background .15s;
  }
  .checklist li:hover { background: var(--surface2); }
  .checklist li.done { opacity: .55; }
  .checklist li.done .check-text { text-decoration: line-through; color: var(--muted); }

  .check-box {
    width: 16px; height: 16px; min-width: 16px;
    border: 2px solid var(--border);
    border-radius: 3px;
    margin-top: 1px;
    display: flex; align-items: center; justify-content: center;
    transition: all .15s;
    font-size: 10px;
  }
  .done .check-box {
    background: var(--green);
    border-color: var(--green);
    color: #000;
  }
  .check-text { flex: 1; line-height: 1.4; }
  .check-sub  { font-size: 11px; color: var(--muted); margin-top: 2px; }

  /* ── Settings table ── */
  .settings-grid { margin: 12px 0 20px; }
  .setting-row {
    display: grid;
    grid-template-columns: 220px 1fr;
    gap: 0;
    border: 1px solid var(--border);
    border-bottom: none;
    font-size: 13px;
  }
  .setting-row:first-child { border-radius: var(--radius) var(--radius) 0 0; }
  .setting-row:last-child  { border-bottom: 1px solid var(--border); border-radius: 0 0 var(--radius) var(--radius); }
  .setting-name {
    padding: 10px 14px;
    background: var(--surface);
    border-right: 1px solid var(--border);
    font-weight: 600;
    color: var(--heading);
  }
  .setting-desc {
    padding: 10px 14px;
    background: var(--surface2);
    color: var(--muted);
    line-height: 1.5;
  }
  .setting-badge {
    display: inline-block;
    font-size: 10px;
    font-weight: 700;
    padding: 1px 5px;
    border-radius: 3px;
    margin-left: 6px;
    text-transform: uppercase;
    letter-spacing: .04em;
  }
  .badge-rec  { background: rgba(63,185,80,.2);  color: var(--green); }
  .badge-adv  { background: rgba(88,166,255,.2); color: var(--blue); }
  .badge-warn { background: rgba(248,81,73,.2);  color: var(--red); }

  /* ── Trouble table ── */
  .trouble-item {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    margin-bottom: 12px;
    overflow: hidden;
  }
  .trouble-header {
    padding: 12px 16px;
    background: var(--surface2);
    font-weight: 600;
    color: var(--heading);
    font-size: 13px;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; gap: 8px;
  }
  .trouble-body { padding: 14px 16px; font-size: 13px; }
  .trouble-body .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: var(--muted); margin-bottom: 4px; }
  .trouble-body p { margin-bottom: 10px; }

  .step-list { list-style: none; counter-reset: steps; margin: 8px 0; }
  .step-list li {
    counter-increment: steps;
    display: flex; gap: 10px;
    margin-bottom: 8px;
    font-size: 13px;
    align-items: flex-start;
  }
  .step-list li::before {
    content: counter(steps);
    display: flex; align-items: center; justify-content: center;
    min-width: 22px; height: 22px;
    background: var(--accent);
    color: #fff;
    border-radius: 50%;
    font-size: 11px;
    font-weight: 700;
    margin-top: 1px;
  }

  /* ── Command table ── */
  .cmd-table { width: 100%; border-collapse: collapse; margin: 12px 0 20px; font-size: 13px; }
  .cmd-table th {
    text-align: left;
    padding: 8px 12px;
    background: var(--surface2);
    border: 1px solid var(--border);
    color: var(--muted);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .06em;
    font-weight: 600;
  }
  .cmd-table td {
    padding: 9px 12px;
    border: 1px solid var(--border);
    background: var(--surface);
    vertical-align: top;
    line-height: 1.45;
  }
  .cmd-table tr:hover td { background: var(--surface2); }
  .cmd-name { font-family: var(--font-mono); color: var(--accent2); font-size: 12px; }

  /* ── Badge pill ── */
  .pill {
    display: inline-flex; align-items: center;
    padding: 2px 8px;
    border-radius: 99px;
    font-size: 11px;
    font-weight: 600;
  }
  .pill-orange { background: rgba(224,92,45,.2); color: var(--accent); }
  .pill-green  { background: rgba(63,185,80,.2); color: var(--green); }
  .pill-blue   { background: rgba(88,166,255,.2); color: var(--blue); }
  .pill-red    { background: rgba(248,81,73,.2);  color: var(--red); }

  /* ── Version block ── */
  .version-table { width: 100%; border-collapse: collapse; margin: 12px 0; font-size: 13px; }
  .version-table th { text-align: left; padding: 8px 12px; background: var(--surface2); border: 1px solid var(--border); color: var(--muted); font-size: 11px; text-transform: uppercase; letter-spacing: .06em; }
  .version-table td { padding: 9px 12px; border: 1px solid var(--border); background: var(--surface); }

  /* ── Scroll reset button ── */
  .reset-btn {
    background: var(--surface2);
    border: 1px solid var(--border);
    color: var(--muted);
    padding: 6px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 12px;
    margin-top: 16px;
    transition: all .15s;
  }
  .reset-btn:hover { border-color: var(--accent); color: var(--accent); }

  /* ── Progress bar ── */
  .progress-wrap { margin-bottom: 20px; }
  .progress-label { font-size: 12px; color: var(--muted); margin-bottom: 6px; display: flex; justify-content: space-between; }
  .progress-bar { height: 6px; background: var(--surface2); border-radius: 3px; overflow: hidden; }
  .progress-fill { height: 100%; background: var(--green); border-radius: 3px; transition: width .3s; }

  /* scrollbar */
  ::-webkit-scrollbar { width: 6px; }
  ::-webkit-scrollbar-track { background: transparent; }
  ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }
</style>
</head>
<body>

<div class="layout">

  <!-- ══════════════════════════════════════════════
       SIDEBAR
  ══════════════════════════════════════════════ -->
  <nav class="sidebar">
    <div class="sidebar-logo">
      <div class="logo-icon">🦅</div>
      <div>
        <div class="logo-text">Remote Falcon</div>
        <div class="logo-sub">FPP Plugin Help</div>
      </div>
    </div>

    <div class="nav-section">
      <div class="nav-label">Start Here</div>
      <a class="nav-item active" onclick="show('overview')">Overview</a>
      <a class="nav-item" onclick="show('quickstart')">⚡ Quick-Start Checklist</a>
    </div>

    <div class="nav-section">
      <div class="nav-label">Account &amp; Control Panel</div>
      <a class="nav-item" onclick="show('account')">Account Setup</a>
      <a class="nav-item" onclick="show('cp-settings')">RF Settings</a>
      <a class="nav-item" onclick="show('sequences')">Sequences</a>
    </div>

    <div class="nav-section">
      <div class="nav-label">FPP Plugin</div>
      <a class="nav-item" onclick="show('plugin-install')">Installation</a>
      <a class="nav-item" onclick="show('plugin-config')">Configuration</a>
      <a class="nav-item" onclick="show('plugin-settings')">All Settings Reference</a>
      <a class="nav-item" onclick="show('commands')">FPP Commands</a>
      <a class="nav-item" onclick="show('how-it-works')">How It Works</a>
    </div>

    <div class="nav-section">
      <div class="nav-label">Maintenance</div>
      <a class="nav-item" onclick="show('fpp-updates')">FPP Version Updates</a>
      <a class="nav-item" onclick="show('troubleshooting')">Troubleshooting</a>
    </div>

    <div class="nav-section">
      <div class="nav-label">Reference</div>
      <a class="nav-item" onclick="show('api-fields')">FPP API Fields</a>
      <a class="nav-item" onclick="show('cheatsheet')">Cheat Sheet</a>
    </div>
  </nav>

  <!-- ══════════════════════════════════════════════
       MAIN CONTENT
  ══════════════════════════════════════════════ -->
  <main class="main">

    <!-- ─────────────────── OVERVIEW ─────────────────── -->
    <div id="overview" class="section active">
      <h1>Remote Falcon — FPP Plugin Help</h1>

      <p>Remote Falcon is a web application that integrates with Falcon Player (FPP) to let your show's visitors request or vote on sequences to be played on your light display. This help file covers everything from first-time setup through season-to-season maintenance.</p>

      <div class="callout callout-info">
        <div class="callout-label">ℹ️ Self-Hosted Note</div>
        This plugin is configured to connect to a <strong>self-hosted</strong> Remote Falcon server. The Plugins API endpoint is set to your own domain. If you need to change it, see the <em>Plugins API Path</em> field under Developer Settings in the plugin UI.
      </div>

      <h2>What Remote Falcon Does</h2>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px;">
        <div class="card">
          <div class="card-title">🎵 Jukebox Mode</div>
          <p>Viewers request sequences that get added to a queue. Sequences play in the order they were requested.</p>
        </div>
        <div class="card">
          <div class="card-title">🗳️ Voting Mode</div>
          <p>Viewers vote on what plays next. The highest-voted sequence wins at the end of each voting round.</p>
        </div>
        <div class="card">
          <div class="card-title">📱 Custom Viewer Page</div>
          <p>Your show gets its own branded webpage where visitors interact — no app needed for viewers.</p>
        </div>
        <div class="card">
          <div class="card-title">⚙️ FPP Integration</div>
          <p>The plugin listens to FPP's status and automatically queues the right sequence at the right time.</p>
        </div>
      </div>

      <h2>System Architecture</h2>
      <p>There are three pieces that work together:</p>
      <div class="card">
        <div style="font-family:var(--font-mono);font-size:12px;color:var(--muted);line-height:2;">
          [Viewer's Phone] → [Your Domain (Cloudflare)] → [DigitalOcean Droplet]<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↕ NGINX routes to Control Panel / Viewer / Plugins API<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↕<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[FPP Plugin on Pi/BB]<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↕<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[FPP → Your Light Show]
        </div>
      </div>
    </div>

    <!-- ─────────────────── QUICK-START CHECKLIST ─────────────────── -->
    <div id="quickstart" class="section">
      <h1>⚡ Quick-Start Checklist</h1>
      <p>Complete these in order. Click each item to mark it done. Progress is tracked below.</p>

      <div class="progress-wrap">
        <div class="progress-label">
          <span>Setup Progress</span>
          <span id="prog-count">0 / 18</span>
        </div>
        <div class="progress-bar"><div class="progress-fill" id="prog-fill" style="width:0%"></div></div>
      </div>

      <h2>Phase 1 — Account &amp; Server</h2>
      <ul class="checklist" id="checklist">
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Create your account on your self-hosted Remote Falcon instance<div class="check-sub">Navigate to your domain and click Sign Up. Email verification is skipped on self-hosted instances.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Confirm the Control Panel loads at your domain<div class="check-sub">You should see the Remote Falcon dashboard after logging in.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Copy your Show Token from Profile → Account Settings → Account<div class="check-sub">This alphanumeric token is what the FPP plugin uses to identify your show. Treat it like a password.</div></div></li>

        <h2>Phase 2 — Control Panel Configuration</h2>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Go to Viewer Page → Create a new Viewer Page<div class="check-sub">Without this step your Viewer Page will be blank.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Go to Remote Falcon Settings → Viewer Page tab → Set Active Viewer Page<div class="check-sub">Select the Viewer Page you just created from the dropdown.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Choose your Viewer Control Mode (Jukebox or Voting) in RF Settings<div class="check-sub">You can change this later, but you MUST restart the FPP listener any time you switch modes.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Enable Viewer Control (the on/off toggle) in RF Settings<div class="check-sub">When off, viewers see the After Hours page. Toggle on before your show starts.</div></div></li>

        <h2>Phase 3 — FPP Plugin Setup</h2>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">In FPP → Content Setup → Plugin Manager, install the Remote Falcon plugin<div class="check-sub">Scroll down to find Remote Falcon and click Install.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">FULLY power cycle your Pi/BB after install (unplug, don't just reboot)<div class="check-sub">Critical! A simple reboot is not enough after first install. The Show Token will not save without a full power cycle.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Go to Content Setup → Remote Falcon plugin page in FPP<div class="check-sub">You'll find the plugin link in the Content Setup menu after the reboot.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Paste your Show Token into the Show Token field and press Tab or Enter<div class="check-sub">This saves the token to the plugin config.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Create your Remote Playlist in FPP (sequences only — no Lead Ins/Outs)<div class="check-sub">This playlist should NOT be used in any FPP schedule. It exists only for Remote Falcon to read sequences from.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Select your Remote Playlist from the dropdown in the plugin and click Sync with RF<div class="check-sub">This sends your sequence list to Remote Falcon so viewers can see and request them.</div></div></li>

        <h2>Phase 4 — Verify &amp; Test</h2>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Click Run Checks in the plugin — confirm all checks pass<div class="check-sub">Checks: internet connectivity, token entered, playlist synced, no lead ins/outs, playlist not in schedule.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Click Test Connectivity to confirm FPP can reach your self-hosted API<div class="check-sub">Should return a green success status.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Start a scheduled show in FPP (not the Remote Playlist — your normal schedule)<div class="check-sub">The plugin listener only activates when FPP is playing something.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Confirm Plugin Status shows "Listener Running"</div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Test a viewer request from your Viewer Page and confirm FPP queues it<div class="check-sub">Open your viewer page URL in a phone browser and make a request. Watch FPP respond.</div></div></li>
      </ul>

      <button class="reset-btn" onclick="resetChecklist()">Reset Checklist</button>
    </div>

    <!-- ─────────────────── ACCOUNT ─────────────────── -->
    <div id="account" class="section">
      <h1>Account Setup</h1>

      <h2>Creating Your Account</h2>
      <p>On your self-hosted Remote Falcon instance, navigate to your domain and click <strong>Sign Up</strong>. Fill in your first name, last name, show name, and password.</p>

      <div class="callout callout-tip">
        <div class="callout-label">💡 Show Name Tip</div>
        Your show name becomes part of your viewer page URL. Keep it short and easy to type — your viewers will be typing it on their phones in the dark. Example: <em>Webb Family Show</em> → <code>webbfamilyshow.yourdomain.com</code>
      </div>

      <div class="callout callout-info">
        <div class="callout-label">ℹ️ Self-Hosted</div>
        Email verification is automatically skipped on self-hosted instances. You can log in immediately after creating your account.
      </div>

      <h2>Your Show Token</h2>
      <p>The Show Token is the most important credential in Remote Falcon. Find it at:</p>
      <ul class="step-list">
        <li>Click your profile icon (top right of Control Panel)</li>
        <li>Go to <strong>Account Settings</strong></li>
        <li>Click the <strong>Account</strong> tab</li>
        <li>Your Show Token is displayed there — copy it</li>
      </ul>

      <div class="callout callout-warn">
        <div class="callout-label">⚠️ Security</div>
        Treat your Show Token like a password. It cannot be used to log into Remote Falcon, but someone who has it could take control of your show queue. Do not share it publicly.
      </div>

      <h2>Changing Your Show Name or Email</h2>
      <p>Both can be changed under <strong>Profile → Account Settings → User Profile</strong>. Note that changing your show name also changes your viewer page URL. Changing your email logs you out and requires re-verification.</p>

      <h2>Forgot Password</h2>
      <p>Use the <strong>Forgot Password</strong> link on the Sign In page. A reset email will be sent to your registered address.</p>
    </div>

    <!-- ─────────────────── RF SETTINGS ─────────────────── -->
    <div id="cp-settings" class="section">
      <h1>Remote Falcon Settings</h1>

      <h2>Viewer Control</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Viewer Control</div>
          <div class="setting-desc">Master on/off switch. When <strong>OFF</strong>, viewers see the After Hours page. When <strong>ON</strong>, viewers can interact with your sequences. Use FPP Commands to automate turning this on/off with your schedule.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Viewer Control Mode</div>
          <div class="setting-desc"><strong>Jukebox</strong> — Requests queue in order.<br><strong>Voting</strong> — Viewers vote; highest vote wins each round.<br><span class="pill pill-red">⚠ Restart listener after switching modes</span></div>
        </div>
      </div>

      <h2>Viewer Page Settings</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Active Viewer Page</div>
          <div class="setting-desc">Which of your saved viewer pages is shown to visitors. Must be set or your page will be blank.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Viewer Page Title</div>
          <div class="setting-desc">The text shown in the browser tab. Set this to your show name.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Viewer Page Icon URL</div>
          <div class="setting-desc">URL of an image to use as the browser tab icon (favicon). Must be a full URL to an accessible image.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Make it Snow</div>
          <div class="setting-desc">Adds a snow animation to the viewer page. Note: if only half the page snows, check your CSS for <code>text-align: center</code> in global styles.</div>
        </div>
      </div>

      <h2>Jukebox Settings</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Queue Depth</div>
          <div class="setting-desc">Maximum number of requests allowed in the queue at once. Set to <code>0</code> for unlimited. Recommended: 3–5 to keep your queue manageable.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Sequence Request Limit</div>
          <div class="setting-desc">How many recent requests are checked before allowing the same sequence again. Setting to <code>2</code> means a sequence won't repeat until 2 others have played. Set to <code>0</code> for no limit.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Prevent Multiple Requests</div>
          <div class="setting-desc">When on, a viewer can only make one request per playing sequence. Good for preventing queue stuffing.</div>
        </div>
      </div>

      <h2>Voting Settings</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Prevent Multiple Votes</div>
          <div class="setting-desc">When on, a viewer can only vote once per voting round.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Reset Votes After Round</div>
          <div class="setting-desc">When on, vote counts reset to 0 after each round. When off, votes carry over to the next round.</div>
        </div>
      </div>

      <h2>Interaction Safeguards</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Play PSA</div>
          <div class="setting-desc">Plays a Public Service Announcement sequence at a set frequency. Good for reminding viewers of show rules (parking, headlights, etc.).</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Managed PSA</div>
          <div class="setting-desc">Remote Falcon automatically manages PSA timing — you don't need it in your normal schedule. Counts sequence plays and fires the PSA at the set frequency.<br><span class="pill pill-red">Caution with Interrupt Schedule</span> — PSAs will play immediately if interrupt is on.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">PSA Frequency</div>
          <div class="setting-desc">How often the PSA fires. Example: <code>2</code> = every 2 requests or voting rounds.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Check Viewer Present</div>
          <div class="setting-desc"><strong>GPS Mode</strong> — Uses viewer's phone location to confirm they're at your show. Set your show's lat/lon and check radius in miles.<br><strong>Code Mode</strong> — Viewer must enter a code before requesting. You set the code.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Hide Sequence After Played</div>
          <div class="setting-desc">Hides a sequence from the viewer list for N plays after it's been requested. Prevents the same song being requested over and over. Be careful: setting this too high with a small playlist can hide everything.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Block Viewer IP Addresses</div>
          <div class="setting-desc">Blocks specific viewer devices from having their requests counted. Find viewer IPs in the Dashboard Stats Export.</div>
        </div>
      </div>
    </div>

    <!-- ─────────────────── SEQUENCES ─────────────────── -->
    <div id="sequences" class="section">
      <h1>Sequences</h1>

      <h2>The Sequences Grid</h2>
      <p>All sequences synced from your FPP Remote Playlist appear here. Key columns:</p>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Status</div>
          <div class="setting-desc"><strong>Active</strong> — exists in your current playlist, can be played.<br><strong>Inactive</strong> — was in the playlist but removed. Cannot be played; exists for historical reference.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Type</div>
          <div class="setting-desc"><strong>Sequence</strong> — audio + lights (.fseq). <strong>Command</strong> — FPP command. <strong>Media</strong> — audio/video only.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Display Name</div>
          <div class="setting-desc">What viewers actually see on the Viewer Page. Set this to a friendly, readable name.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Artist</div>
          <div class="setting-desc">Displayed below the sequence name on the Viewer Page.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Visibility</div>
          <div class="setting-desc">Controls whether a sequence appears on the Viewer Page. Hide PSA sequences, commands, or anything you don't want viewers to be able to request.</div>
        </div>
      </div>

      <div class="callout callout-warn">
        <div class="callout-label">⚠️ Sequence Order</div>
        The order sequences appear in Remote Falcon matches the order they exist in your FPP playlist. Reordering in FPP requires a re-sync in the plugin.
      </div>

      <h2>Sequence Details</h2>
      <p>Expand any sequence row to set:</p>
      <ul class="step-list">
        <li><strong>Display Name</strong> — what viewers see instead of the raw filename</li>
        <li><strong>Artist</strong> — shown under the display name on the viewer page</li>
        <li><strong>Image URL</strong> — album art or any image URL (must be publicly accessible)</li>
        <li><strong>Category</strong> — groups sequences into labeled sections on the viewer page</li>
      </ul>

      <h2>Sequence Categories</h2>
      <p>Categories let you group sequences into labeled sections on the Viewer Page — for example, "Traditional," "Pop," or "Kids." Use the <code>.category-label</code> and <code>.category-section</code> CSS classes to style the category appearance.</p>

      <h2>Sequence Groups</h2>
      <p>Sequence Groups let you chain multiple sequences together as one requestable item. Example use case: play an intro sequence followed by the main sequence whenever someone requests a song.</p>
      <div class="callout callout-info">
        <div class="callout-label">ℹ️ Group Rules</div>
        <ul style="margin-left:16px;margin-top:4px;font-size:13px;">
          <li>Grouped sequences no longer appear individually on the Viewer Page</li>
          <li>A sequence can only belong to one group</li>
          <li>Play order within a group matches sequence order in the FPP playlist grid</li>
        </ul>
      </div>
    </div>

    <!-- ─────────────────── PLUGIN INSTALL ─────────────────── -->
    <div id="plugin-install" class="section">
      <h1>Plugin Installation</h1>

      <h2>Step-by-Step Install</h2>
      <ul class="step-list">
        <li>In FPP, go to <strong>Content Setup → Plugin Manager</strong></li>
        <li>Scroll down to find <strong>Remote Falcon</strong> in the plugin list</li>
        <li>Click the <strong>Install</strong> button and wait for installation to complete</li>
        <li>You will see a yellow <strong>Reboot</strong> banner — note the warning below before rebooting</li>
        <li><strong>FULLY power cycle your Pi or BeagleBone</strong> — unplug from power and plug back in</li>
        <li>After power cycle, go to <strong>Content Setup → Remote Falcon</strong> to access the plugin</li>
      </ul>

      <div class="callout callout-error">
        <div class="callout-label">🔴 Critical — Power Cycle Required</div>
        A simple reboot is NOT sufficient after the first install. The Show Token will not save properly unless you do a full power cycle (unplug from wall, wait 5 seconds, plug back in). If the token still won't save after one cycle, do it again.
      </div>

      <h2>Verifying the Install</h2>
      <p>After power cycling, the Remote Falcon plugin link should appear under <strong>Content Setup</strong> in FPP's navigation. If you don't see it, try the power cycle again.</p>

      <h2>Updating the Plugin</h2>
      <p>Future plugin updates are pulled from your GitHub fork automatically through FPP's plugin manager. To manually force an update, go to <strong>Plugin Manager</strong>, find Remote Falcon, and click <strong>Update</strong> if available.</p>
    </div>

    <!-- ─────────────────── PLUGIN CONFIG ─────────────────── -->
    <div id="plugin-config" class="section">
      <h1>Plugin Configuration</h1>

      <h2>Initial Setup (Do This After Install)</h2>
      <ul class="step-list">
        <li>Open the Remote Falcon plugin page from <strong>Content Setup → Remote Falcon</strong></li>
        <li>Paste your <strong>Show Token</strong> into the Show Token field and press Tab or Enter to save</li>
        <li>In FPP, create your <strong>Remote Playlist</strong> — add all sequences you want viewers to request. No Lead Ins, Lead Outs, or scheduled use.</li>
        <li>Select your Remote Playlist from the dropdown in the plugin</li>
        <li>Click <strong>Sync with RF</strong> to send the sequence list to Remote Falcon</li>
        <li>Click <strong>Run Checks</strong> to verify configuration</li>
      </ul>

      <h2>Remote Playlist Rules</h2>
      <div class="callout callout-warn">
        <div class="callout-label">⚠️ Remote Playlist — Critical Rules</div>
        <ul style="margin-left:16px;margin-top:6px;font-size:13px;line-height:1.8;">
          <li>Do <strong>NOT</strong> add Lead Ins or Lead Outs to the Remote Playlist</li>
          <li>Do <strong>NOT</strong> use the Remote Playlist in any FPP schedules</li>
          <li>Do <strong>NOT</strong> manually start the Remote Playlist in FPP</li>
          <li>After modifying the playlist, always click <strong>Sync with RF</strong> again and then <strong>Restart Listener</strong></li>
        </ul>
      </div>

      <h2>Interrupt Schedule Setting</h2>
      <p>This controls how viewer requests interact with your running schedule:</p>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">OFF (Default) — Jukebox</div>
          <div class="setting-desc">Plugin waits for the current scheduled sequence to finish before queuing the viewer request. No interruptions — ever.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">ON — Jukebox</div>
          <div class="setting-desc">A viewer request immediately interrupts the scheduled playlist and plays next. Once a viewer request is playing, it won't be interrupted by another request.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">OFF — Voting</div>
          <div class="setting-desc">Plugin waits for current sequence to finish, then fetches the winning vote.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">ON — Voting</div>
          <div class="setting-desc">A vote win immediately interrupts the scheduled playlist. The winning sequence is never interrupted. Schedule resumes where it left off after all requests/votes play.</div>
        </div>
      </div>
    </div>

    <!-- ─────────────────── ALL SETTINGS ─────────────────── -->
    <div id="plugin-settings" class="section">
      <h1>All Plugin Settings — Full Reference</h1>

      <h2>Standard Settings</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Show Token <span class="setting-badge badge-rec">Required</span></div>
          <div class="setting-desc">Your unique alphanumeric show token from the Remote Falcon Control Panel (Profile → Account Settings → Account). The plugin cannot communicate with Remote Falcon without this.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Remote Playlist <span class="setting-badge badge-rec">Required</span></div>
          <div class="setting-desc">The FPP playlist containing your requestable sequences. After selecting, click <strong>Sync with RF</strong>. Never use this playlist in a schedule.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Sync Metadata</div>
          <div class="setting-desc">When checked, sequence title, artist, and comment metadata is included in the sync. Useful if you store track info in FPP's sequence metadata fields.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Interrupt Schedule</div>
          <div class="setting-desc">Toggle whether viewer requests interrupt the currently playing scheduled sequence. See Configuration page for full behavior details.</div>
        </div>
      </div>

      <h2>Advanced Settings</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Request/Vote Fetch Time <span class="setting-badge badge-adv">Advanced</span></div>
          <div class="setting-desc">How many seconds before a sequence ends the plugin checks for the next request or vote. Default: <code>3</code>. Range: 1–5 seconds. Increase if on a slow network.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Additional Wait Time <span class="setting-badge badge-adv">Advanced</span></div>
          <div class="setting-desc">Extra wait time after fetching a request, to give FPP time to process. Default: <code>0</code>. If requests are skipping or disappearing, try setting to 2–5 seconds.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">FPP Status Check Time <span class="setting-badge badge-adv">Advanced</span></div>
          <div class="setting-desc">How often (in seconds) the listener polls FPP's status. Default: <code>1</code>. Increase if you see high CPU usage or FPP freezing. Must be between 0 and the Request Fetch Time value. Try <code>0.5</code> if using Interrupt Schedule and the schedule briefly starts before jumping to a request.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Restart Listener</div>
          <div class="setting-desc">Restarts the Remote Falcon Listener process. Use this after changing the Remote Playlist or switching Jukebox/Voting modes.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Stop Listener <span class="setting-badge badge-warn">Caution</span></div>
          <div class="setting-desc">Immediately stops the listener. No requests or votes will be fetched until you restart. Use this for deliberate end-of-night shutdown. Use the Restart Listener button or FPP Command to resume.</div>
        </div>
      </div>

      <h2>Developer Settings</h2>
      <div class="callout callout-warn">
        <div class="callout-label">⚠️ Don't Touch Unless You Know What You're Doing</div>
        Changing these incorrectly will break the plugin's ability to communicate with Remote Falcon.
      </div>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Plugins API Path</div>
          <div class="setting-desc">The URL of your self-hosted Plugins API endpoint. Should be set to <code>https://YOUR-DOMAIN.com/remote-falcon-plugins-api</code>. Only change this if you're migrating to a new server.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Verbose Logging <span class="setting-badge badge-warn">Log Size Warning</span></div>
          <div class="setting-desc">Enables detailed logging of every status check, API call, and timing event. Use only for debugging — can create very large log files during a show.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Plugin Config</div>
          <div class="setting-desc">Direct text editor for the raw plugin config file. Load → edit → save. Reset to Default restores factory settings. Only use if you know the config file format.</div>
        </div>
      </div>

      <h2>Diagnostic Tools</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Run Checks</div>
          <div class="setting-desc">Validates your full plugin configuration. Checks: internet access, token entered, playlist synced, no lead ins/outs, playlist not in schedule. Run this whenever you change anything.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Test Connectivity</div>
          <div class="setting-desc">Directly tests whether FPP can reach your self-hosted Plugins API. Confirms the API path is correct and the server is responding.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Tail Log (50 lines)</div>
          <div class="setting-desc">Shows the last 50 lines of the Remote Falcon listener log file directly in the UI. Use to quickly diagnose what the listener is doing without SSH access.</div>
        </div>
      </div>
    </div>

    <!-- ─────────────────── FPP COMMANDS ─────────────────── -->
    <div id="commands" class="section">
      <h1>FPP Commands</h1>

      <p>FPP Commands let you automate Remote Falcon settings from within your FPP playlists and schedules. Add these as playlist commands or schedule them at specific times.</p>

      <table class="cmd-table">
        <thead>
          <tr>
            <th>Command</th>
            <th>What It Does</th>
            <th>Common Use</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><div class="cmd-name">Turn Viewer Control On</div></td>
            <td>Enables the Viewer Control setting — viewers can now request or vote.</td>
            <td>Schedule to run a few minutes before your show starts each night.</td>
          </tr>
          <tr>
            <td><div class="cmd-name">Turn Viewer Control Off</div></td>
            <td>Disables Viewer Control — viewers see the After Hours page.</td>
            <td>Schedule at end-of-night to automatically close viewer interaction.</td>
          </tr>
          <tr>
            <td><div class="cmd-name">Turn Interrupt Schedule On</div></td>
            <td>Enables Interrupt Schedule. Automatically restarts the listener.</td>
            <td>Switch to interrupt mode at a specific time during the show.</td>
          </tr>
          <tr>
            <td><div class="cmd-name">Turn Interrupt Schedule Off</div></td>
            <td>Disables Interrupt Schedule. Automatically restarts the listener.</td>
            <td>Return to non-interrupt mode later in the night.</td>
          </tr>
          <tr>
            <td><div class="cmd-name">Purge Queue</div></td>
            <td>Clears all pending Jukebox requests from the queue.</td>
            <td>Add as a Lead Out on your last sequence to clear overnight.</td>
          </tr>
          <tr>
            <td><div class="cmd-name">Reset Votes</div></td>
            <td>Resets all vote counts to zero.</td>
            <td>Add as a Lead Out on your last sequence each night.</td>
          </tr>
          <tr>
            <td><div class="cmd-name">Update Remote Playlist</div></td>
            <td>Uploads a different playlist to Remote Falcon mid-show.</td>
            <td>Switch from a "Kid Friendly" playlist early in the evening to an adult playlist later.</td>
          </tr>
          <tr>
            <td><div class="cmd-name">Restart Listener</div></td>
            <td>Restarts the Remote Falcon Listener process.</td>
            <td>Use after any configuration change or if behavior seems off.</td>
          </tr>
          <tr>
            <td><div class="cmd-name">Stop Listener</div></td>
            <td>Stops the listener entirely. No requests or votes will be processed.</td>
            <td>Add as a Lead Out on the final sequence of your nightly show.</td>
          </tr>
        </tbody>
      </table>

      <div class="callout callout-warn">
        <div class="callout-label">⚠️ After Using Update Remote Playlist Command</div>
        Any time you use the Update Remote Playlist command, you must also use the Restart Listener command immediately after for the change to take effect.
      </div>
    </div>

    <!-- ─────────────────── HOW IT WORKS ─────────────────── -->
    <div id="how-it-works" class="section">
      <h1>How the Plugin Works</h1>

      <h2>The Listener Loop</h2>
      <p>The Remote Falcon Plugin runs a background process called the <strong>Remote Falcon Listener</strong>. Here's what it does on every cycle:</p>

      <ul class="step-list">
        <li>Reads its config file to check if it's enabled and if any restart is pending</li>
        <li>Calls FPP's local status API at <code>http://127.0.0.1/api/system/status</code></li>
        <li>If FPP is <strong>idle</strong> — does nothing and waits</li>
        <li>If FPP is <strong>playing</strong> — updates Remote Falcon with what's currently playing and what's scheduled next</li>
        <li>When the sequence is within the <em>Request Fetch Time</em> of ending — calls the Plugins API for the next request or vote</li>
        <li>If a request/vote is found — calls FPP's command API to queue or play it</li>
        <li>Sleeps for the <em>FPP Status Check Time</em> and repeats</li>
      </ul>

      <h2>FPP API Calls Made by the Plugin</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name"><code>GET /api/system/status</code></div>
          <div class="setting-desc">Gets FPP's current state — what's playing, how many seconds remain, what playlist is active. This is polled on every cycle.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>GET /api/playlist/{name}</code></div>
          <div class="setting-desc">Gets the full playlist details to determine the next scheduled sequence.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>GET /api/command/Insert Playlist After Current</code></div>
          <div class="setting-desc">Queues the next viewer request to play after the current sequence ends (non-interrupt mode).</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>GET /api/command/Insert Playlist Immediate</code></div>
          <div class="setting-desc">Forces the viewer request to play right now, interrupting the current scheduled sequence (interrupt mode).</div>
        </div>
      </div>

      <h2>Remote Falcon API Calls Made by the Plugin</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name"><code>GET /remotePreferences</code></div>
          <div class="setting-desc">Fetches your show's viewer control mode (Jukebox vs Voting) on startup.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>GET /nextPlaylistInQueue</code></div>
          <div class="setting-desc">Gets the next sequence in the Jukebox queue.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>GET /highestVotedPlaylist</code></div>
          <div class="setting-desc">Gets the currently winning sequence in Voting mode.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>POST /updateWhatsPlaying</code></div>
          <div class="setting-desc">Tells Remote Falcon what sequence is currently playing (for the viewer page display).</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>POST /updateNextScheduledSequence</code></div>
          <div class="setting-desc">Tells Remote Falcon what's scheduled to play next.</div>
        </div>
      </div>
    </div>

    <!-- ─────────────────── FPP UPDATES ─────────────────── -->
    <div id="fpp-updates" class="section">
      <h1>FPP Version Updates</h1>

      <p>When FPP releases a new version, some aspects of the plugin may break if FPP changed its internal API. This page tells you exactly what to check and how to fix it.</p>

      <h2>Pre-Season Update Checklist</h2>
      <p>Run this every year before show season, or any time FPP releases a new version.</p>

      <ul class="step-list">
        <li>Check FPP's release notes at <code>github.com/FalconChristmas/fpp/releases</code> for any API changes</li>
        <li>On a test Pi running the new FPP version, open: <code>http://{fpp-ip}/api/system/status</code> in a browser</li>
        <li>Confirm the JSON response still contains these exact field names (see API Fields page)</li>
        <li>Manually test the Insert Playlist command: <code>http://{fpp-ip}/api/command/Insert%20Playlist%20After%20Current/{playlist}/0/0</code></li>
        <li>If fields changed, update <code>remote_falcon_listener.php</code> in your GitHub fork with the new field names</li>
        <li>Check <code>pluginInfo.json</code> — if the new FPP version exceeds the current max version block, add a new version entry</li>
        <li>Run a live test with Verbose Logging enabled and watch the log for errors</li>
      </ul>

      <h2>Current FPP Version Compatibility</h2>
      <table class="version-table">
        <thead>
          <tr>
            <th>FPP Version Range</th>
            <th>Plugin Branch</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>2.0 – 4.9.9</td>
            <td><code>master-4</code> (legacy)</td>
            <td><span class="pill pill-red">Legacy / End of Life</span></td>
          </tr>
          <tr>
            <td>5.0 – 7.99</td>
            <td><code>master</code></td>
            <td><span class="pill pill-blue">Supported</span></td>
          </tr>
          <tr>
            <td>8.0 – 8.99</td>
            <td><code>master</code></td>
            <td><span class="pill pill-blue">Supported</span></td>
          </tr>
          <tr>
            <td>9.0+</td>
            <td><code>master</code></td>
            <td><span class="pill pill-green">Current / Active</span></td>
          </tr>
        </tbody>
      </table>

      <div class="callout callout-info">
        <div class="callout-label">ℹ️ FPP 9.5 is the latest release as of this writing</div>
        The <code>maxFPPVersion: 0</code> on the 9.0+ entry means no upper version ceiling — the master branch is declared compatible with all future FPP 9.x releases. When FPP 10.x ships, evaluate whether a new version block is needed.
      </div>

      <h2>If You Need to Update the Plugin Code</h2>
      <p>Most FPP compatibility fixes only require editing one file:</p>
      <ul class="step-list">
        <li>Go to your GitHub fork: <code>github.com/YOUR-USERNAME/remote-falcon-plugin</code></li>
        <li>Click <code>remote_falcon_listener.php</code> and then the pencil (edit) icon</li>
        <li>Find the field name that changed and update it (use Ctrl+F to search)</li>
        <li>Commit the change with a message like <code>Fix FPP 10.x status field names</code></li>
        <li>In FPP, go to Plugin Manager and update the Remote Falcon plugin</li>
        <li>Restart the FPP listener</li>
      </ul>
    </div>

    <!-- ─────────────────── TROUBLESHOOTING ─────────────────── -->
    <div id="troubleshooting" class="section">
      <h1>Troubleshooting</h1>

      <div class="trouble-item">
        <div class="trouble-header">🔴 Show Token Won't Save</div>
        <div class="trouble-body">
          <div class="label">Problem</div>
          <p>You entered your Show Token but the plugin still says it hasn't been entered. Most common on fresh installs.</p>
          <div class="label">Solution</div>
          <ul class="step-list">
            <li>Do a full power cycle — unplug your Pi/BB from power, wait 5 seconds, plug back in</li>
            <li>After reboot, re-enter the token and press Tab or Enter</li>
            <li>If it still doesn't save, power cycle a second time</li>
          </ul>
        </div>
      </div>

      <div class="trouble-item">
        <div class="trouble-header">🔴 Requests or Votes Not Playing</div>
        <div class="trouble-body">
          <div class="label">Problem</div>
          <p>Viewers are making requests or votes but FPP isn't responding to them.</p>
          <div class="label">Solution</div>
          <ul class="step-list">
            <li>Make sure FPP is actively playing something (a scheduled show or manually started playlist — NOT the Remote Playlist). The listener does nothing when FPP is idle.</li>
            <li>Confirm the Remote Playlist is NOT used in any FPP schedule and has NOT been manually started</li>
            <li>Restart the listener. If you recently switched between Jukebox and Voting, a restart is mandatory.</li>
            <li>Turn on Verbose Logging and check the log file for errors</li>
            <li>Click Test Connectivity to confirm your API server is reachable</li>
          </ul>
        </div>
      </div>

      <div class="trouble-item">
        <div class="trouble-header">🔴 Wrong Sequence Is Playing</div>
        <div class="trouble-body">
          <div class="label">Problem</div>
          <p>Requests are being picked up but the wrong sequence plays.</p>
          <div class="label">Solution</div>
          <ul class="step-list">
            <li>Confirm the Remote Playlist is not in any schedule and has not been manually started</li>
            <li>Ensure the Remote Playlist has no Lead Ins, Lead Outs, or non-sequence items</li>
            <li>Re-sync your Remote Playlist: in the plugin, click Sync with RF, then verify the sequence index numbers on the Sequences page in the Control Panel match what's in FPP</li>
          </ul>
        </div>
      </div>

      <div class="trouble-item">
        <div class="trouble-header">🟡 Viewer Page Is Blank</div>
        <div class="trouble-body">
          <div class="label">Problem</div>
          <p>You open your Viewer Page URL but it's completely blank.</p>
          <div class="label">Solution</div>
          <ul class="step-list">
            <li>Go to the Control Panel → Viewer Page menu → create a new Viewer Page</li>
            <li>Go to Remote Falcon Settings → Viewer Page tab → set Active Viewer Page to your new page</li>
          </ul>
        </div>
      </div>

      <div class="trouble-item">
        <div class="trouble-header">🟡 Plugin Status Shows "Stopped"</div>
        <div class="trouble-body">
          <div class="label">Problem</div>
          <p>The plugin status indicator shows Stopped instead of Running.</p>
          <div class="label">Solution</div>
          <ul class="step-list">
            <li>Click Restart Listener in the plugin settings</li>
            <li>If it stops again shortly after, check the log file for error messages</li>
            <li>Verify your Plugins API Path is correct and your server is up</li>
          </ul>
        </div>
      </div>

      <div class="trouble-item">
        <div class="trouble-header">🟡 Schedule Briefly Starts Then Jumps to Request</div>
        <div class="trouble-body">
          <div class="label">Problem</div>
          <p>With Interrupt Schedule enabled, the normal schedule plays for a split second before the request takes over — visible as a flash or brief wrong sequence.</p>
          <div class="label">Solution</div>
          <p>Set the FPP Status Check Time to <code>0.5</code> seconds in Advanced Settings. This gives the interrupt logic more precision.</p>
        </div>
      </div>

      <div class="trouble-item">
        <div class="trouble-header">🟡 Test Connectivity Fails</div>
        <div class="trouble-body">
          <div class="label">Problem</div>
          <p>The Test Connectivity button returns an error or no response.</p>
          <div class="label">Solution</div>
          <ul class="step-list">
            <li>Confirm your DigitalOcean Droplet is running</li>
            <li>Confirm your domain's DNS is resolving (try your domain in a browser)</li>
            <li>Check the Plugins API Path in Developer Settings is correct: <code>https://YOUR-DOMAIN.com/remote-falcon-plugins-api</code></li>
            <li>SSH into your Droplet and run <code>docker ps</code> to confirm all containers are up</li>
          </ul>
        </div>
      </div>

      <h2>Reading the Log File</h2>
      <p>The listener log is your primary diagnostic tool. Use the <strong>Tail Log</strong> button in the plugin UI to see the last 50 lines without SSH. If you need the full log, it's at:</p>
      <div class="card" style="font-family:var(--font-mono);font-size:12px;color:var(--accent2);">/opt/fpp/www/logs/remote-falcon-listener.log</div>
      <p>Key things to look for in the log:</p>
      <div class="settings-grid" style="margin-top:10px;">
        <div class="setting-row">
          <div class="setting-name"><code>FPPD is not running!</code></div>
          <div class="setting-desc">FPP's main daemon isn't running. FPP may not be started, or there's a crash.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>ERROR - Failed to get FPP status</code></div>
          <div class="setting-desc">The plugin can't reach FPP's status API. Could mean FPP's internal API endpoint changed after an update.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>ERROR - Failed to insert playlist</code></div>
          <div class="setting-desc">The FPP command to queue a sequence failed. Command syntax may have changed in a new FPP version.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>No requests</code> / <code>No votes</code></div>
          <div class="setting-desc">The plugin is working correctly and checked for requests/votes but found none queued.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name"><code>Queuing requested sequence...</code></div>
          <div class="setting-desc">Normal successful operation — plugin found a request and is queuing it in FPP.</div>
        </div>
      </div>
    </div>

    <!-- ─────────────────── API FIELDS ─────────────────── -->
    <div id="api-fields" class="section">
      <h1>FPP API Fields Reference</h1>

      <p>This page documents the exact FPP API fields the plugin depends on. Check these fields after any FPP version upgrade to confirm they haven't changed.</p>

      <h2>Status API — <code>GET /api/system/status</code></h2>
      <p>Called on every listener cycle. If any of these fields change names or move in the JSON structure, the plugin will silently fail.</p>

      <table class="cmd-table">
        <thead>
          <tr><th>Field Name</th><th>Type</th><th>Purpose</th><th>Failure If Missing</th></tr>
        </thead>
        <tbody>
          <tr>
            <td><code>status_name</code></td>
            <td>string</td>
            <td>Plugin checks if this equals <code>"idle"</code>. If idle, it does nothing.</td>
            <td>Plugin never activates — thinks FPP is always idle</td>
          </tr>
          <tr>
            <td><code>current_sequence</code></td>
            <td>string</td>
            <td>Filename of the currently playing .fseq sequence</td>
            <td>Plugin can't tell what's playing; can't update viewer page</td>
          </tr>
          <tr>
            <td><code>current_song</code></td>
            <td>string</td>
            <td>Fallback for media-only playback (no .fseq, just audio/video)</td>
            <td>Media-only shows won't track currently playing</td>
          </tr>
          <tr>
            <td><code>seconds_remaining</code></td>
            <td>integer</td>
            <td>Countdown to end of current sequence. Compared against Request Fetch Time setting.</td>
            <td>Plugin never knows when to fetch next request — queueing breaks entirely</td>
          </tr>
          <tr>
            <td><code>current_playlist.playlist</code></td>
            <td>string</td>
            <td>Name of the currently active playlist. Used to detect if the Remote Playlist is playing vs. a scheduled playlist (for interrupt logic).</td>
            <td>Interrupt logic breaks — plugin can't distinguish remote vs. scheduled</td>
          </tr>
        </tbody>
      </table>

      <h2>How to Verify After a FPP Upgrade</h2>
      <ul class="step-list">
        <li>Open a browser or terminal on the same network as your Pi</li>
        <li>Navigate to <code>http://{your-pi-ip}/api/system/status</code></li>
        <li>Start a show in FPP so the status shows something playing</li>
        <li>Verify each field from the table above exists with the same name in the JSON response</li>
        <li>If any name changed, update it in <code>remote_falcon_listener.php</code> in your GitHub fork</li>
      </ul>

      <h2>FPP Command Endpoints Used</h2>
      <table class="cmd-table">
        <thead>
          <tr><th>Endpoint</th><th>Used When</th></tr>
        </thead>
        <tbody>
          <tr>
            <td><code>GET /api/command/Insert%20Playlist%20After%20Current/{playlist}/{index}/{index}</code></td>
            <td>Non-interrupt mode — queues next request to play after current sequence ends</td>
          </tr>
          <tr>
            <td><code>GET /api/command/Insert%20Playlist%20Immediate/{playlist}/{index}/{index}</code></td>
            <td>Interrupt mode — immediately plays the requested sequence</td>
          </tr>
          <tr>
            <td><code>GET /api/playlist/{name}</code></td>
            <td>Gets full playlist details to find the next scheduled sequence</td>
          </tr>
          <tr>
            <td><code>GET /api/playlists/stopgracefully</code></td>
            <td>Stops FPP gracefully when commanded</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- ─────────────────── CHEAT SHEET ─────────────────── -->
    <div id="cheatsheet" class="section">
      <h1>Quick Reference Cheat Sheet</h1>

      <h2>🚦 Pre-Show Night Checklist</h2>
      <ul class="checklist">
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Confirm your DigitalOcean server is running<div class="check-sub">Visit your domain — the control panel should load.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Viewer Control is toggled ON in RF Settings (or automated via FPP Command)<div class="check-sub">Viewers see the After Hours page if this is off.</div></div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Plugin Status shows "Listener Running" in FPP plugin page</div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Remote Playlist is synced (no recent sequence changes pending)</div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">FPP scheduled show is running</div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Test one viewer request from your phone to confirm end-to-end</div></li>
      </ul>
      <button class="reset-btn" onclick="resetNightChecklist()">Reset Night Checklist</button>

      <h2>🛑 End-of-Night Checklist</h2>
      <ul class="checklist" id="night-end">
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Viewer Control toggled OFF (or FPP Command scheduled to do this)</div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Queue purged or votes reset if applicable</div></li>
        <li onclick="toggle(this)"><div class="check-box">✓</div><div class="check-text">Listener stopped (optional — restarts automatically on next show start)</div></li>
      </ul>

      <h2>🔧 Settings Quick Reference</h2>
      <table class="cmd-table">
        <thead><tr><th>Setting</th><th>Recommended Default</th><th>When to Change</th></tr></thead>
        <tbody>
          <tr><td>Request Fetch Time</td><td><code>3</code> seconds</td><td>Increase to 5 on slow/WiFi connections</td></tr>
          <tr><td>Additional Wait Time</td><td><code>0</code> seconds</td><td>Set 2–5 if requests are skipping or disappearing</td></tr>
          <tr><td>FPP Status Check Time</td><td><code>1</code> second</td><td>Increase if high CPU; try 0.5 with Interrupt Schedule</td></tr>
          <tr><td>Queue Depth</td><td><code>3</code></td><td>Increase for longer shows; 0 = unlimited</td></tr>
          <tr><td>Sequence Request Limit</td><td><code>2</code></td><td>Increase to prevent repeat requests; 0 = no limit</td></tr>
          <tr><td>PSA Frequency</td><td><code>3–5</code></td><td>Lower for more PSAs; higher for fewer</td></tr>
        </tbody>
      </table>

      <h2>🚨 Emergency Fixes</h2>
      <div class="settings-grid">
        <div class="setting-row">
          <div class="setting-name">Plugin stuck / not responding</div>
          <div class="setting-desc">Click <strong>Restart Listener</strong> in the plugin page.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Show Token disappeared after install</div>
          <div class="setting-desc">Full power cycle the Pi (unplug from wall, wait, replug). Re-enter token after boot.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Wrong sequence playing</div>
          <div class="setting-desc">Re-sync Remote Playlist. Confirm playlist is not in any FPP schedule.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">API server not responding</div>
          <div class="setting-desc">SSH into Droplet and run <code>docker ps</code>. If containers are down, run <code>sh start-rf.sh</code>.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Need to debug silently</div>
          <div class="setting-desc">Enable Verbose Logging → let show run → use Tail Log button to see what the listener is doing.</div>
        </div>
        <div class="setting-row">
          <div class="setting-name">Requests not being fetched after mode switch</div>
          <div class="setting-desc">Restart the listener. Required every time you switch between Jukebox and Voting modes.</div>
        </div>
      </div>

      <h2>📋 Key File Locations</h2>
      <table class="cmd-table">
        <thead><tr><th>File / Location</th><th>What It Is</th></tr></thead>
        <tbody>
          <tr><td><code>/opt/fpp/www/logs/remote-falcon-listener.log</code></td><td>Main listener log file</td></tr>
          <tr><td><code>/opt/fpp/media/config/plugin.remote-falcon</code></td><td>Plugin config file (raw INI format)</td></tr>
          <tr><td><code>/opt/fpp/media/plugins/remote-falcon/</code></td><td>Plugin installation directory</td></tr>
          <tr><td><code>https://YOUR-DOMAIN.com/remote-falcon-plugins-api</code></td><td>Your self-hosted Plugins API endpoint</td></tr>
          <tr><td><code>https://YOUR-DOMAIN.com</code></td><td>Your Control Panel and Viewer Page root</td></tr>
        </tbody>
      </table>
    </div>

  </main>
</div>

<script>
  // ── Navigation ──
  function show(id) {
    document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    event.target.classList.add('active');
    document.querySelector('.main').scrollTop = 0;
  }

  // ── Checklist ──
  function toggle(el) {
    el.classList.toggle('done');
    updateProgress();
  }

  function updateProgress() {
    const items = document.querySelectorAll('#quickstart .checklist li');
    const done  = document.querySelectorAll('#quickstart .checklist li.done').length;
    const total = items.length;
    document.getElementById('prog-count').textContent = done + ' / ' + total;
    document.getElementById('prog-fill').style.width  = (done / total * 100) + '%';
  }

  function resetChecklist() {
    document.querySelectorAll('#quickstart .checklist li').forEach(li => li.classList.remove('done'));
    updateProgress();
  }

  function resetNightChecklist() {
    document.querySelectorAll('#cheatsheet .checklist li').forEach(li => li.classList.remove('done'));
  }

  updateProgress();
</script>

</body>
</html>
