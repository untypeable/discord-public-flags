import requests

token = "your_discord_token"

req = requests.get("https://discordapp.com/api/users/:user_id",headers={"authorization":token})

public_flags = req.json()['public_flags']

flags = {
    131072: ['VERIFIED_DEVELOPER'],
    65536: ['VERIFIED_BOT'],
    16384: ['BUG_HUNTER_LEVEL_2'],
    4096: ['SYSTEM'],
    1024: ['TEAM_USER'],
    512: ['PREMIUM_EARLY_SUPPORTER'],
    256: ['HYPESQUAD_ONLINE_HOUSE_3'],
    128: ['HYPESQUAD_ONLINE_HOUSE_2'],
    64: ['HYPESQUAD_ONLINE_HOUSE_1'],
    8: ['BUG_HUNTER_LEVEL_1'],
    4: ['HYPESQUAD'],
    2: ['PARTNER'],
    1: ['STAFF']
}

things = []

while public_flags != 0:
    for item in flags.keys():
        if public_flags >= item:
            things.append(flags[item][0])
            public_flags = public_flags - item

print(things)
