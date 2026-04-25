# Remote Falcon FPP Plugin — Personal Fork

Personal fork of the Remote Falcon FPP Plugin maintained for use with my light show.

## My Setup
- **Self-hosted server:** https://YOUR-DOMAIN.com
- **Plugins API endpoint:** https://YOUR-DOMAIN.com/remote-falcon-plugins-api
- **DigitalOcean Droplet:** [your droplet name/region]
- **FPP version tested:** 9.5

## What I Changed From Original
- `pluginInfo.json` — srcURL and homeURL updated to this fork
- `remote_falcon_listener.php` — default pluginsApiPath set to my server
- `remote_falcon_ui.html` — warning label updated to my server URL

## How to Update the Plugin in FPP to Pull From This Fork
In FPP → Plugin Manager, uninstall the original Remote Falcon plugin, 
then install from this URL:
https://raw.githubusercontent.com/YOUR-USERNAME/remote-falcon-plugin/master/pluginInfo.json

## FPP API Fields the Listener Depends On (Check These After FPP Upgrades)
From `/api/system/status`:
- `status_name` — must equal "idle" or other
- `current_sequence` — filename of playing .fseq
- `current_song` — fallback for media-only playback
- `seconds_remaining` — countdown to sequence end
- `current_playlist.playlist` — name of active playlist

FPP Commands used:
- `Insert Playlist After Current`
- `Insert Playlist Immediate`

## Upstream Repo
https://github.com/Remote-Falcon/remote-falcon-plugin
