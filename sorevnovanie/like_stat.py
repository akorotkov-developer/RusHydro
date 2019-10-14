f = open('vote.log', 'r')
teams = {}
realVotes = {}
for line in f:
	if '[rejected]' in line:
		continue

	line = line.split("\t")

	ip, team = line[1], line[2]
	if not realVotes.has_key(team):
		realVotes[team] = 0

	if not teams.has_key(team):
		teams[team] = {}

	if len(line) >= 8:
		v = int(line[3])
		if v > realVotes[team]:
			realVotes[team] = v

	if not teams[team].has_key(ip):
		teams[team][ip] = 0

	teams[team][ip] += 1

f.close()

votes = {}
for team, ips in teams.items():
	print 'Team %s' % team

	votes[team] = 0
	for ip, count in sorted(ips.iteritems(), key=lambda (k,v): (v,k), reverse=True):
		if count > 10:
			print "%s:\t%s" % (ip, count)
			votes[team] += count

print

for team, count in sorted(votes.iteritems(), key=lambda (k,v): (v,k), reverse=True):
	print "%s:\t%s" % (team, count)

print

for team, count in sorted(realVotes.iteritems(), key=lambda (k,v): (v,k), reverse=True):
	print "%s:\t%s" % (team, count)

