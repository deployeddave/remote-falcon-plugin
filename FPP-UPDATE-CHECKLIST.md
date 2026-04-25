# FPP Update Compatibility Checklist
Run this every time FPP releases a new version before updating your show Pi.

## Step 1 — Check FPP Status API Response
On a test device running the new FPP version, run:
curl http://{fpp-ip}/api/system/status

Confirm these fields still exist with these exact names:
- [ ] status_name
- [ ] current_sequence
- [ ] current_song
- [ ] seconds_remaining
- [ ] current_playlist.playlist

## Step 2 — Test Playlist Commands
Run these manually and confirm FPP responds with 200 OK:
curl "http://{fpp-ip}/api/command/Insert%20Playlist%20After%20Current/{playlist}/0/0"
curl "http://{fpp-ip}/api/command/Insert%20Playlist%20Immediate/{playlist}/0/0"

## Step 3 — Update pluginInfo.json If Needed
If FPP version is beyond the current maxFPPVersion, add a new version block.
Current version blocks: 2.0-4.9.9, 5.0-7.99, 8.0-8.99, 9.0+ (open)

## Step 4 — Run Live Test
Enable verbose logging in the plugin settings.
Watch the log: /opt/fpp/www/logs/remote-falcon-listener.log
Confirm you see sequence queuing happening, not just status checks.

## Step 5 — Log Results Here
| FPP Version | Date Tested | Result | Changes Made |
|---|---|---|---|
| 9.5 | Initial setup | Pass | None |
